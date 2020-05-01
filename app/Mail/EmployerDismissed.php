<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmployerDismissed extends Mailable
{
    use Queueable, SerializesModels;

    public $employer;

    public function __construct($employer)
    {
        $this->employer = $employer;
    }

    function build()
    {
        return $this->from('labtr3s@gmail.com')
            ->subject('Se dio de baja a ' . $this->employer->name)
            ->view('emails.employers.dismissed');
    }
}