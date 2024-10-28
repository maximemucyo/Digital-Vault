<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $role= $user->role;
        $users= $user->getUsers();
        switch ($role) {
            case 'admin':
                return view('dashboard'); 
            case 'super':
                $admins= $user->getAdmins();
                return view('super.dashboard', compact('users','admins')); 
            case 'user':
                return view('user.dashboard',compact('user'));         
            default:
                return view('user.dashboard',compact('user'));  
        }
    } 
    public function users()
    {
        $user = auth()->user();
        $role= $user->role;
        switch ($role) {
            case 'admin':
                $referees= $user->getReferees();
                return view('admin.users', compact('referees')); 
            case 'super':
                $users= $user->getUsers();
                $admins= $user->getAdmins();
                return view('super.users', compact('users','admins')); 
            case 'user':
                return view('user.dashboard',compact('user'));         
            default:
                return view('user.dashboard',compact('user'));  
        }
    } 

    public function dashboard()
    {
        $csvdata= $this->readCSV("");
        $user = auth()->user();
        $role= $user->role;
        switch ($role) {
            case 'admin':
                return view('dashboard',compact('csvdata')); 
            case 'super':
                $users= $user->getUsers();
                $admins= $user->getAdmins();
                return view('super.dashboard', compact('csvdata','users','admins')); 
            case 'user':
                return view('user.dashboard',compact('user'));        
            default:
                return view('user.dashboard',compact('user'));  
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

    public function admins()
    {
        $user = auth()->user();
        $role= $user->role;
        if($role=='super'){
            $users= $user->getUsers();
            $admins= $user->getAdmins();
            return view('super.admins', compact('admins')); 
        }
    } 
}
