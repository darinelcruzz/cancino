<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class TaskCreated extends Notification
{
    use Queueable;

    public function via($notifiable)
   {
       return [TelegramChannel::class];
   }

   public function toTelegram($task)
   {
       return TelegramMessage::create()
           ->to(env('TELEGRAM_TASKS_CHANNEL_ID'))
           ->content("Nueva tarea de *" . $task->store->name . "*: " . $task->description)
           ->button('Ver pendientes', 'grupocancino.com/admin/pendientes')
           ->button('Marcar como visto', 'grupocancino.com/pendientes/visto');
   }
}
