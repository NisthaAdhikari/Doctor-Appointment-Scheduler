<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Bitfumes\KarixNotificationChannel\KarixChannel;

class OTPNotification extends Notification
{
    use Queueable;


    public $OTP;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($OTP)
    {
        //
        $this->OTP=$OTP;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [KarixChannel::class];
    }


    public function toKarix($notifiable)
    {
        return KarixMessage::create()
            ->to('+9779843494020')
            ->from('+9779843494020')
            ->content("Your OTP for confirmation is: $this->OTP");
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->markdown('OTP',['OTP'=> $this->OTP]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
