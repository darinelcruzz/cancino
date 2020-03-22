<?php

namespace App\Observers;

use App\Employer;
use App\Mail\EmployerCreated;
use App\Mail\EmployerCreatedToFirm;
use Illuminate\Support\Facades\Mail;

class EmployerObserver
{
    function created(Employer $employer)
    {
        $employer->storeDocuments(request());

        Mail::to('victorjcg_6@hotmail.com')
            ->queue(new EmployerCreated($employer));
        Mail::to('victorjcg_6@hotmail.com')
            ->queue(new EmployerCreatedToFirm($employer));
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
