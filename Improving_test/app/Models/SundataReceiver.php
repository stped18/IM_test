<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SundataReceiver extends Model
{
    use HasFactory;

    //sunDataReceiverToDay uses coordinates for receiving information on the sun on today

    public static function sunDataReceiverToDay($lat, $long){
        $url = "https://api.sunrise-sunset.org/json?lat=".$lat ."&lng=".$long."&date=today";
        $response = file_get_contents($url);
        $response = json_decode($response,true);
        $response= json_encode($response["results"]);
        return json_decode($response, true);
    }

    //sunDataReceiverToDay uses kordinates for receiving information on the sun on today
    public static function sunDataReceiverAt($lat, $long, $date){
        $data=array();

        $da=new DateTime($date);
        for ($i = 0 ; $i < 8; $i++){
            $url = "https://api.sunrise-sunset.org/json?lat=".$lat ."&lng=".$long."&date=".$da->format('Y-m-d');
            $response = file_get_contents($url);
            $response = json_decode($response,true);
            $response= json_encode($response["results"]);
            array_push($data, ["respone"=>json_decode($response,true), "date"=>$da->format('Y-m-d')]);
            if ((date('N', strtotime($da->format('Y-m-d'))) >= 7)){
                return $data;
            }
            $da = $da->modify('+1 day');

        }

        return $data;
    }




}
