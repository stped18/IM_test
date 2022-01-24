<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Google\Cloud\Translate\V2\TranslateClient;
use function PHPUnit\Framework\assertSame;

class LocationReceiver extends Model
{
    use HasFactory;
    //TODO
    // recieve data from 3-party to tranlate from Danish to English

    // locationResiver takes the city and country and use an api for receiving the coordinates
    public static function locationResiver($city,$country){
        $list = array("københavn"=>"copenhagen","århus"=>"aarhus");
        $city = strtolower($city);
        foreach ($list as $key=>$value){
            if ($key==$city){
                $city=$value;
            }
        }
        $api_key="4a63d10078414d8ab0ef3c2dea20d54f";
        $url = 'https://api.opencagedata.com/geocode/v1/json?key='.$api_key.'&q='.$city ."&lng=".$country.'&pretty=1';
        $data = file_get_contents($url);
        $content = json_decode($data, true);
        return array("lat"=>$content['results'][0]['geometry']['lat'],"long"=>$content['results'][0]['geometry']['lng']);

    }


}



