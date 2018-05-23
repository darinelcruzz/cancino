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
    $date = Date::createFromFormat($original_format, $original_date);
    return $date->format($format);
}

function fdif($start_date, $end_date)
{
    $start = new Date(strtotime($start_date));
    $end = new Date(strtotime($end_date));
    $interval = $start->diff($end);
    $interval = $interval->format('%a');
    if ($interval < 4) {
        return 'success';
    }else{
        return 'danger';
    }
}

function fnumber($original_number)
{
    return '$ ' . number_format($original_number, 2);
}

function drawHeader(...$titles)
{
    echo "<template slot=\"header\"><tr>";
    foreach ($titles as $title) {
        echo "<th>" . ucfirst($title) . "</th>";
    }
    echo "</tr></template>";
}
