<?php

namespace App\Http\Controllers;

use App\{Employer, Service};
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    function index()
    {
        $employees = Employer::where('status', '!=', 'inactivo')
            ->whereMonth('birthday', '=', now()->month)
            ->whereDay('birthday', '=', now()->day)
            ->where('notified', 0)
            ->get();

        Employer::where('status', '!=', 'inactivo')
            ->whereMonth('birthday', '!=', now()->month)
            ->whereDay('birthday', '!=', now()->day)
            ->update(['notified' => 0]);

        $services = Service::whereDate('expired_at', now())->where('notified', 0)->get();

        foreach ($services as $service) {
            $service->notify(new \App\Notifications\ExpiredServices());
        }

        foreach ($employees as $employee) {
            $employee->notify(new \App\Notifications\EmployeeBirthday());
        }

        return view('welcome');
    }
}
