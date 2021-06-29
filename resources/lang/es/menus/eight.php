<?php

return [

    'counts' => [
        'title' => 'Agregar normal',
        'icon' => 'fa fa-calculator',
        'route' => ['count.create', 'normal']
    ],
    'barcode' => [
        'title' => 'Agregar con código de barras',
        'icon' => 'fa fa-barcode',
        'route' => ['count.create', 'codigo-de-barras']
    ],
    'Inventory' => [
        'title' => 'Historial',
        'icon' => 'fa fa-people-carry',
        'route' => 'count.index'
    ],


    'logout' => [
        'title' => 'Salir',
        'icon' => 'fa fa-sign-out-alt',
        'route' => 'logout'
    ],
];
