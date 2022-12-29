<?php
use Jenssegers\Date\Date;

function usesas($ctrl, $fun, $as = null)
{
    if ($as) {
        return ['uses' => "$ctrl@$fun", 'as' => $as];
    }
    return ['uses' => "$ctrl@$fun", 'as' => $fun];
}

function isAdmin()
{
    return auth()->user()->level == 1;
}

function getStore()
{
    return auth()->user()->store;
}

function isVKS()
{
    return auth()->user()->store_id == 1;
}

function fdate($original_date, $format = 'Y-m-d', $original_format = 'Y-m-d H:i:s', $alt = 'N/A')
{
    return date($format, strtotime($original_date));
    if ($original_date == NULL) {
        return $alt;
    }
    $date = Date::createFromFormat($original_format, $original_date);
    return $date->format($format);
}

function fnumber($original_number)
{
    return '$' . number_format($original_number, 2);
}

function iva($original_number)
{
    return '$' . number_format(($original_number - ($original_number/1.16)), 2);
}

function subtotal($original_number)
{
    return '$' . number_format(($original_number/1.16), 2);
}

function drawHeader(...$titles)
{
    echo "<template slot=\"header\"><tr>";
    foreach ($titles as $title) {
        echo "<th>" . ucfirst($title) . "</th>";
    }
    echo "</tr></template>";
}

function fileExists($file)
{
    $file_headers = @get_headers($file);

    return $file_headers[0] == 'HTTP/1.1 404 Not Found';
}

function colorDay($sale, $amount, $deposit)
{
    $start = new Date(strtotime($sale));
    $day = $start->format('D');
    $end = new Date(strtotime($deposit));
    $interval = $start->diff($end);
    $interval = $interval->format('%a');

    // return $day;

    if ($day == 'vie.' && $interval < 4 ) {
        return 'green';
    }elseif($day == 'sáb.' && $interval < 3 ){
        return 'green';
    }elseif($interval < 2 || $amount == 0){
        return 'green';
    }else{
        return 'red';
    }
}

//labels
function pendingDeposits()
{
    return App\Sale::where('store_id', auth()->user()->store_id)
        ->whereNull('date_deposit')->count();
}

function pendingDepositsAll()
{
    return App\Sale::whereNull('date_deposit')->count();
}

function pendingTasks()
{
    return App\Task::where('store_id', auth()->user()->store_id)
        ->where('status', '!=', 'finalizada')->count();
}

function pendingTasksAll()
{
    return App\Task::where('status', '!=', 'finalizada')->count();
}

function pendingServices()
{
    return App\Service::where('status', 'pendiente')->count();
}

function printedServices()
{
    return App\Service::where('status', 'impreso')->count();
}

function expiredServices()
{
    return App\Service::where('status', 'vencido')->orWhere('status', 'impreso vencido')->count();
}

function undefinedShoppings()
{
    return App\Shopping::whereType('no definido')->count();
}

function pendingShoppings()
{
    return App\Shopping::where('type', '!=', 'no definido')->whereStatus('pendiente')->count();
}

function printedShoppings()
{
    return App\Shopping::whereStatus('impreso')->count();
}

function pendingInvoices()
{
    return App\Invoice::whereStatus('pendiente')->count();
}

function takenProducts()
{
    return App\TakenProduct::whereNull('pos')->count();
}

function pendingNotes()
{
    return App\Note::where('store_id', auth()->user()->store_id)
        ->whereStatus('pendiente')->count();
}

function pendingNotesAll()
{
    return App\Note::whereStatus('pendiente')->count();
}

function pendingCheckupsAll()
{
    return App\Checkup::whereStatus(0)->count();
}

function evaluationEmployeeAll()
{
    return App\Employer::whereIn('status', ['evaluacion uno', 'evaluacion dos', 'evaluacion tres'])->count();
}

function evaluationImssEmployeesAll()
{
    return App\Employer::where('imss', 0)->count();
}

function pendingLoans()
{
    $from = App\Loan::where('from', auth()->user()->store_id)
        ->where('status', '!=', 'facturado')
        ->where('status', '!=', 'cancelado')->count();
    $to = App\Loan::where('to', auth()->user()->store_id)
        ->where('status', '!=', 'facturado')
        ->where('status', '!=', 'cancelado')->count();
    return $from + $to;
}

function uncheckedCheckups()
{
    return App\Checkup::where('status', '<', 2)->count();
}

function checkEmployeeIngress()
{
    $employees = App\Employer::whereIn('status', ['primera capacitacion', 'segunda capacitacion', 'tercera capacitacion'])->get();

    foreach ($employees as $employee) {
        if ($employee->status == 'primera capacitacion' && time() > strtotime('+1 month', strtotime($employee->ingress))) {
            $employee->update(['status' => 'evaluacion uno']);
            $employee->notify(new \App\Notifications\EmployerTraining());
        }

        if ($employee->status == 'segunda capacitacion' && time() > strtotime('+2 month', strtotime($employee->ingress))) {
            $employee->update(['status' => 'evaluacion dos']);
            $employee->notify(new \App\Notifications\EmployerTraining());
        }

        if ($employee->status == 'tercera capacitacion' && time() > strtotime('+3 month', strtotime($employee->ingress))) {
            $employee->update(['status' => 'evaluacion tres']);
            $employee->notify(new \App\Notifications\EmployerTraining());
        }

        if ($employee->status == 'primer año' && time() > strtotime('+1 year', strtotime($employee->ingress))) {
            $employee->update(['status' => 'evaluacion año']);
            $employee->notify(new \App\Notifications\EmployerTraining());
        }
    }
}

function pluralize($singular, $apply = true)
{
    if (!$apply) return $singular;

    $last_letter = strtolower($singular[strlen($singular)-1]);

    switch($last_letter) {
        case 'a':
            return $singular.'s';
        case 'e':
            return $singular.'s';
        case 'i':
            return $singular.'s';
        case 'o':
            return $singular.'s';
        case 'u':
            return $singular.'s';
        default:
            return $singular.'es';
    }
}
