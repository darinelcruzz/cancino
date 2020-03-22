<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmployerCreatedToFirm extends Mailable
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
            ->subject('Nuevo empleado ' . $this->employer->store->social)
            ->markdown('emails.employers.createdToFirm', ['employer' => $this->employer])
            ->attach(Storage::path('public/employers/' . $this->employer->id . '/INE.pdf'))
            ->attach(Storage::path('public/employers/' . $this->employer->id . '/DOMICILIO.pdf'))
            ->attach(Storage::path('public/employers/' . $this->employer->id . '/CURP.pdf'))
            ->attach(Storage::path('public/employers/' . $this->employer->id . '/ACTA.pdf'));
    }
}
