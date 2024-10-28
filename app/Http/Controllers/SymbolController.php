<?
namespace App\Http\Controllers;

use App\Events\SymbolUpdated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SymbolController extends Controller
{
    public function updateSymbol(Request $request)
    {
        $userId = $request->user()->id;
        $symbol = $request->input('symbol');

        // Save symbol to database
        DB::table('user_symbols')->updateOrInsert(
            ['user_id' => $userId],
            ['symbol' => $symbol]
        );

        // Broadcast the symbol update event
        broadcast(new SymbolUpdated($symbol))->toOthers();

        return response()->json(['success' => true]);
    }
}
