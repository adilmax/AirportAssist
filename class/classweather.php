<?php

namespace airportAssWeather;

class Weather{


    public function loadWeather($latitude,$longitude ,$timestamp )
    {
        $cSession = curl_init();
        //step2
        curl_setopt($cSession,CURLOPT_URL,"https://maps.googleapis.com/maps/api/timezone/json?location=$latitude,$longitude&timestamp=$timestamp&key=AIzaSyDt-fCSDdkYiBbJA201kU_7L2l02l-hh58");
        curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($cSession,CURLOPT_HEADER, false);
        curl_setopt($cSession, CURLOPT_SSL_VERIFYPEER, false);
        //step3
        $result=curl_exec($cSession);
        //step4
        curl_close($cSession);
        if($result){
            return $result;
        }else{
            return false;
        }
    }

}