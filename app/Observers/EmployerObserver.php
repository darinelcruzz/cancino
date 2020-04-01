<?php

namespace App\Observers;

use App\{Employer, User};
use App\Mail\EmployerCreated;
use App\Mail\EmployerCreatedToFirm;
use Illuminate\Support\Facades\Mail;

class EmployerObserver
{
    function created(Employer $employer)
    {
        $employer->storeDocuments(request());

        $emails = User::where('level', '<', 2)->pluck('email')->toArray();

        Mail::to($emails)->queue(new EmployerCreated($employer));

        // Mail::to($emails)->queue(new EmployerCreatedToFirm($employer));
    }

    function updated(Employer $employer)
    {
        //
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