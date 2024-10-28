<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;
use Illuminate\Support\Collection;

class ChartController extends Controller
{
    public function updateSymbol(Request $request)
    {
        $userId = $request->user()->id;
        $symbol = $request->input('symbol');

        $pusher = new Pusher(env('PUSHER_APP_KEY'), env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'), [
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'useTLS' => true,
        ]);

        $pusher->trigger($userId.'symbol-channel', 'symbol-updated', ['symbol' => $symbol]);
        
        return response()->json(['success' => true]);
    }

    public function chart()
    {
        $csvdata= $this->readCSV("");
        $user = auth()->user();
        $role= $user->role;
        switch ($role) {
            case 'admin':
                return view('chart',compact('csvdata')); 
            case 'super':
                $users= $user->getUsers();
                $admins= $user->getAdmins();
                return view('chart', compact('csvdata1','users','admins')); 
            case 'user':
                return view('chart',compact('user'));        
            default:
                return view('chart',compact('user'));  
        }
    } 

    public function readCSV($symbol)
    {
        $user = Auth::user();
       
        if($symbol==""){
           $symbol="BNBUSDT" ;
        }
        $filename = public_path('chart_data/' . $symbol . '/' . $user->id . '.csv');

        /*create starting csvs for user if the don't have any*/
        if (!file_exists($filename)) {
            $path = public_path('chart_data');
            $folders = File::directories($path);

            foreach ($folders as $folder) {
                $tokenName= basename($folder);
                $csvFileName = "{$user->id}.csv";
                $csvFilePath = "{$folder}/{$csvFileName}"; 
                $defaultCsvPath = "{$folder}/default.csv"; 
                
                if (!File::exists($defaultCsvPath)) {
                    continue; 
                }

                $data = array_map('str_getcsv', file($defaultCsvPath));
                $fileHandle = fopen($csvFilePath, 'w');

                foreach ($data as $row) {
                    fputcsv($fileHandle, $row);
                }

                fclose($fileHandle);

                // if($tokenName=="BTCUSDT"){
                // $filename = $csvFilePath;
                // }                
            }
        }
        
        $collection = new Collection();

        $fileContent = file_get_contents($filename);
    
        $dataArray = json_decode($fileContent, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['error' => 'Invalid JSON data in CSV file!'], 400);
        }

        $collection = new Collection($dataArray);
    
        return $collection;
    
    }

    public function selectedSymbolData(Request $request){
        $symbol = $request->input('symbol');
        $csvdata=$this->readCSV($symbol);

        return view('chart.partials.price_point_modal',compact('csvdata')); 
    }

    public function pricePoints($symbol){
        info($symbol);
        $csvdata=$this->readCSV($symbol);

        return response()->json([
            'render'=> view('chart.partials.price_point_modal',compact('csvdata','symbol'))->render()
        ]);
    }

    public function pricePointUpdate(Request $request)
    {
        info($request);

        $user = auth()->user();
        $userId=$user->id;
        $symbol = $request->input('symbol');
        if($symbol==NULL){
            $symbol="BNBUSDT";
        }

        $timestamp = $request->input('timestamp');
        $high = $request->input('high');
        $low = $request->input('low');
        $open = $request->input('open');
        $close = $request->input('close');

        /*trigger price point change event */
        $pusher = new Pusher(env('PUSHER_APP_KEY'), env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'), [
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'useTLS' => true,
        ]);

        $pusher->trigger($userId.'price-point-channel', 'price-point-updated',
        [
        'timestamp'=>$timestamp,
        'high' =>$high,
        'low' =>$low,
        'close' =>$close,
        'open' =>$open,
        ]);
    
        $pusher->trigger($userId.'price-point-channel', 'price-point-updated', [
            'timestamp' => $timestamp,
            'high' => $high,
            'low' => $low,
            'close' => $close,
            'open' => $open,
        ]);

         /*update csv data */
        $filepath = public_path('chart_data/' . $symbol . '/' . $userId . '.csv');
        $fileContent = file_get_contents($filepath);   
        $dataArray = json_decode($fileContent, true);

        $exists =false;
        foreach ($dataArray as &$row) { 
            if ((int)$row[0] === (int)$timestamp) {
                $exists=true;
                $row[1]=$open;
                $row[2]=$high;
                $row[3]=$low;
                $row[4]=$close;
                
                break; 
            }
        }

        if(!$exists){
            $newData = [(Carbon::parse($timestamp)->timestamp)*1000,$open, $high, $low, $close,0,((Carbon::parse($timestamp)->timestamp)*1000)-1,0,0,0,0,0]; 
            $dataArray[] = $newData;
        }
        $csvData = '[' . implode(', ', array_map(function($row) {
            return '[' . implode(',', $row) . ']';
        }, $dataArray)) . ']'; 
        
        // Step 4: Write the updated CSV content back to the file
        $filepath = public_path('chart_data/' . $symbol . '/' . $userId . '.csv');
        file_put_contents($filepath, $csvData);
        
        info("CSV updated successfully.");
            
        return response()->json([
            'success' => true,
            'data' => [
                'timestamp' => $timestamp,
                'high' => $high,
                'low' => $low,
                'close' => $close,
                'open' => $open,
            ],
        ]);
        
    }
}
