<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class Checklist extends Notification
{
    use Queueable;

    public function via($notifiable)
   {
       return [TelegramChannel::class];
   }

   public function toTelegram($checklist)
   {
       return TelegramMessage::create()
           ->to(env('TELEGRAM_GROUP_ID'))
           ->content("Hoja de visita de *" . $checklist->store->name . "*, tuvo " . $checklist->result * 5 . " hoja color *" . $checklist->colorSpanish . "*" . )
           ->button('Ver ventas', 'grupocancino.com/formato-de-visita/' . $checklist->id);
   }
}
