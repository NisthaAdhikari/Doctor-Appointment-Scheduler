<?php

namespace App;

class SendCode
{
    public static function sendCode($mobile){
        $code =rand(1111,9999);
        $number = '+977'.$mobile;

        $nexmo= app('Nexmo\Client');

        $s= $nexmo->message()->send([
           'to' => $number,
           'from' => '+9779843494020',
            'text' => 'Your verification code for Appointment booking is: '. $code  ,
        ]);
        return $code;
    }
}


