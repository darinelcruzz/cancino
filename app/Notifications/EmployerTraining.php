<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class EmployerTraining extends Notification
{
    use Queueable;

    public function via($notifiable)
   {
       return [TelegramChannel::class];
   }

   public function toTelegram($employer)
   {
       return TelegramMessage::create()
           ->to(env('TELEGRAM_TASKS_CHANNEL_ID'))
           ->content($employer->name . " le toca la " . $employer->status)
           ->button('Ver avance', 'grupocancino.com/empleados/detalles/' . $employer->id);
   }
}
