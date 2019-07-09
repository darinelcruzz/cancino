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

function colorDay($sale, $deposit)
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
    }elseif($interval < 3){
        return 'green';
    }else{
        return 'red';
    }
}
