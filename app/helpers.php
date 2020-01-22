<?php
use Jenssegers\Date\Date;

function usesas($ctrl, $fun, $as = null)
{
    if ($as) {
        return ['uses' => "$ctrl@$fun", 'as' => $as];
    }
    return ['uses' => "$ctrl@$fun", 'as' => $fun];
}

function fdate($original_date, $format = 'Y-m-d', $original_format = 'Y-m-d H:i:s')
{
    if ($original_date == NULL) {
        return 'N/A';
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

    if ($day == 'vie' && $interval < 4 ) {
        return 'green';
    }elseif($day == 'sáb' && $interval < 3 ){
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
        ->where('status', '!=', 'completado')->count();
}

function pendingTasksAll()
{
    return App\Task::where('status', '!=', 'completado')->count();
}

function pendingShoppings()
{
    return App\Shopping::whereStatus('pendiente')->count();
}

function pendingInvoices()
{
    return App\Invoice::whereStatus('pendiente')->count();
}

function pendingWastes()
{
    return App\Waste::whereStatus('pendiente')->count();
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
