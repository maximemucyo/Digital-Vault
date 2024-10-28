<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pusher\Pusher;

class BroadcastingController extends Controller
{
    public function updateSymbol(Request $request)
    {

        $userId = $request->user()->id;
        $symbol = $request->input('symbol');
        $chartType = $request->input('chartType');

        $pusher = new Pusher(env('PUSHER_APP_KEY'), env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'), [
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'useTLS' => true,
        ]);

        $pusher->trigger($userId.'symbol-channel', 'symbol-updated', ['symbol' => $symbol]);
        

        return response()->json(['success' => true]);
    }

    /*Update chart type such as bar, line... */
    public function updateChartType(Request $request)
    {
        info("chart type update");
        $userId = $request->user()->id;
        $symbol = $request->input('symbol');
        $chartType = $request->input('chartType');

        $pusher = new Pusher(env('PUSHER_APP_KEY'), env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'), [
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'useTLS' => true,
        ]);

        $pusher->trigger($userId.'chart-type-channel', 'chart-type-updated', ['symbol' => $symbol, 'type' => $chartType]);


        return response()->json(['success' => true]);
    }

}
