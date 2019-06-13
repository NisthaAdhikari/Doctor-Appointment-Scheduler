<?php

namespace App\model;
use App\Notifications\OTPNotification;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Filesystem\Cache;
use Illuminate\Support\Facades\Mail;
use NotificationChannels\Karix;
use Noifiable;
use Illuminate\Notifications\Notifiable;

class Appointment extends Model
{
    use Notifiable;
    protected $table = 'appointment';
    protected $fillable = ['appointmentNo', 'patientName', 'mobile', 'doctorId', 'appointmentDate','appointmentTime','diseaseDescription'];

//    public function OTP(){
//        return Cache::get($this->OTPKey());
//    }
//
//    public function sendOTP(){
//        $OTP = $this->cacheTheOTP();
//        $this->notify(new OTPNotification($OTP));
//    }
//    public function OTPKey(){
//
//        return "OTP_for_{$this->id}";
//    }
//
//    public function cacheTheOTP(){
//        $OTP = rand(1000,9999);
//        Cache::put([$this->OTPKey() => $OTP], now()->addSeconds(60));
//        return $OTP;
//    }
//
//    public function routeNotificationForKarix()
//    {
//        return $this->email;
//    }
}
