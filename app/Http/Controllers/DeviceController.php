<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\User;
use App\Models\Login;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::all();
        // print_r($devices->all());
        return view('crud.index',[
            "devices" => $devices,
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('crud.add-device');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod("post")) {
            $request->validate([
                'name' => 'required',
                'status' => 'required',
            ]);
            // echo "<pre>";
            //     print_r($Request->all());
            // echo "</pre>";
            $device = new Device();
            $device->name = $request->name;
            $device->status = $request->status;
            
            $device->save();

            session()->flash('success', 'Device saved successfully');
            return redirect('device');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        return view('crud.edit-device', [
            "device" => $device,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $Request, $id)
    {
        $device = Device::find($id);
        $device->name = $Request->name;
        $device->status = $Request->status;
        
        $device->save();
        session()->flash('success', 'Device Updated successfully');
        return redirect('device');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device, Request $request)
    {   
        $device->delete();
        return redirect()->route('device.index')->with('success','Delete Device successfully');
        
        // $request->session()->flash('success','Delete Device successfully');
        // return redirect('device');
    }

         /* Concept of Local scope of laravel model */
    public function getActiveStutus(){
        $device = Device::whereStatus("1")->get();
        echo "<pre>";
            print_r($device);
        echo "<pre>";
    }
    public function getInactiveStatus(){
        $device = Device::whereStatus("0")->get();
        
        echo "<pre>";
            print_r($device);
        echo "<pre>";
    }

            /* How to work with multiple database connection */
    public function GetDevice(){
        $mydiv = Device::all();
        foreach ($mydiv as $value) {
            echo "<pre>";
            echo ($value);
        }
    }
    public function GetUser(){
        /*
                Query builder and migration with multiple database
            $query = DB::connection('mysql_2')->table('users')->get();
            echo "<pre>";
            print_r($query);
        */
        $mydiv = User::all();
        foreach ($mydiv as $value) {
            echo "<pre>";
            echo ($value);
        }
    }
        /* What are helper and how to use it in laravel. */
    public function Helper(){
        /*
            emoveWhiteSpace()
            This function is written app/Helpers.php file
	    */
        // $strings = "Online Web Tutors";
        // echo removeWhiteSpace($strings);
            // We can refer view file\
        return view('helper-view');
    }

    /*
        What are route prefix and how to use it in laravel 
        Go into route folder and product or customer file 
    */

}
