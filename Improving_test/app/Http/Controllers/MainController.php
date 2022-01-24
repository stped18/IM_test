<?php

namespace App\Http\Controllers;

use App\Models\LocationReceiver;
use App\Models\SundataReceiver;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view("index");
    }

    public function dataHandler(Request $request)
    {
        $this->validate($request,[
            'city'=>'required'
        ]);

        $locationdata = LocationReceiver::locationResiver($request["city"],"Denmark");
        if ($request["date"]==""){
            $date=date("Y-m-d");
            $data = SundataReceiver::sunDataReceiverAt($locationdata["lat"],$locationdata["long"],$date);
        }else{
            $data = SundataReceiver::sunDataReceiverAt($locationdata["lat"],$locationdata["long"],$request["date"]);
        }
        return view("data.show", ["data"=>$data]);

    }

    public function show($data){
        return view("data.show", ["data"=>$data]);
    }
}
