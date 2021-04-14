<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class EmployeeBirthday extends Notification
{
    use Queueable;

    public function via($notifiable)
   {
       return [TelegramChannel::class];
   }

   public function toTelegram($employer)
   {
      $employer->update(['notified' => 1]);
      return TelegramMessage::create()
        ->to(env('TELEGRAM_GROUP_ID'))
        ->content("¡" . $employer->name . " cumple años hoy! 🎈🎂🎁🎉");
   }
}
