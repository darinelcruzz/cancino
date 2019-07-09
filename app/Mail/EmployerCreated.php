<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmployerCreated extends Mailable
{
    use Queueable, SerializesModels;

    protected $employer;

    public function __construct($employer)
    {
        $this->employer = $employer;
    }

    function build()
    {
        return $this->from('labtr3s@gmail.com')
            ->subject('Nuevo empleado (a)')
            ->markdown('emails.employers.created', ['employer' => $this->employer]);
    }
}
