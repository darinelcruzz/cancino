<?php

namespace App\Observers;

use App\{Employer, User};
use App\Mail\EmployerCreated;
use App\Mail\EmployerDismissed;
use App\Mail\EmployerCreatedToFirm;
use Illuminate\Support\Facades\Mail;

class EmployerObserver
{
    function created(Employer $employer)
    {
        $employer->storeDocuments(request());

        if (env('APP_ENV') != 'local') {
            $emails = User::where('level', '<', 5)
                ->where('level', '>', 1)
                ->where('username', '!=', 'cheko')
                ->where('password', '!=', 'cancelado')
                ->pluck('email')
                ->pluck('email')
                ->toArray();
                
            $firm = User::where('name', 'Despacho')->pluck('email')->toArray();

            Mail::to($emails)->queue(new EmployerCreated($employer));

            Mail::to($firm)->queue(new EmployerCreatedToFirm($employer));
        }
    }

    function updated(Employer $employer)
    {
        if ($employer->status == 'inactivo') {
            $emails = User::where('level', '<', 5)
                ->where('level', '>', 1)
                ->where('username', '!=', 'cheko')
                ->where('password', '!=', 'cancelado')
                ->pluck('email')
                ->toArray();

            if (env('APP_ENV') == 'local') {
                Mail::to(['labtr3s@gmail.com'])->queue(new EmployerDismissed($employer));
            } else {
                Mail::to($emails)->queue(new EmployerDismissed($employer));
            }
        } else {
            $employer->storeDocuments(request());
        }
    }

    function deleted(Employer $employer)
    {
        //
    }

    function restored(Employer $employer)
    {
        //
    }

    function forceDeleted(Employer $employer)
    {
        //
    }
}
