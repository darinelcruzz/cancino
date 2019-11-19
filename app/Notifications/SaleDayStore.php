<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class SaleDayStore extends Notification
{
    use Queueable;

    public function via($notifiable)
   {
       return [TelegramChannel::class];
   }

   public function toTelegram($sale)
   {
       return TelegramMessage::create()
           ->to(env('TELEGRAM_GROUP_ID'))
           ->content("Corte de *" . $sale->store->name . "*, vendió *" . fnumber($sale->total) . "*, público *" . fnumber($sale->public) . "* del " . fdate($sale->date_sale,'d/M','Y-m-d'))
           ->button('Ver ventas', 'grupocancino.com/admin/ventas');
   }
}
