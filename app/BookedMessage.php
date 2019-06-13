<?php
/**
 * Created by PhpStorm.
 * User: Nistha
 * Date: 4/15/2019
 * Time: 10:44 PM
 */

namespace App;


class BookedMessage
{
    public static function sendMessage($mobile,$appointmentDetails){
        $number = '+977'.$mobile;

        $nexmo= app('Nexmo\Client');

        $s= $nexmo->message()->send([
            'to' => $number,
            'from' => '+9779843494020',
            'text' => $appointmentDetails->patientName.', Your appointment is booked with Dr. ' . $appointmentDetails->name.
                ' at '. $appointmentDetails->appointmentTime. ' on '. $appointmentDetails->appointmentDate . ', '. $appointmentDetails->appointmentDay.
                '. AppointmentNo: '.$appointmentDetails->appointmentNo. '.'
        ]);
    }
}