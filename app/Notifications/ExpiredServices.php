<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class ExpiredServices extends Notification
{
    use Queueable;

    public function via($notifiable)
   {
       return [TelegramChannel::class];
   }

   public function toTelegram($service)
   {
      $service->update(['notified' => 1]);
      return TelegramMessage::create()
        ->to(env('TELEGRAM_TASKS_CHANNEL_ID'))
        ->content("¡" . $service->description . " de " . $service->serviceable->name . " vence hoy!\nPagar *$" . number_format($service->amount, 2). "*");
   }
}
