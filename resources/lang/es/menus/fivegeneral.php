<?php

return [
    'Shoppings' => [
        'title' => 'Compras',
        'icon' => 'fa fa-archive',
        'route' => 'shoppings.index'
    ],

    'Sales' => [
        'title' => 'Ventas',
        'icon' => 'fa fa-money',
        'submenu' => [
            'sales' => [
                'title' => 'Ventas',
                'route' => 'helper.sales',
            ],
            'deposits' => [
                'title' => 'Depositos',
                'route' => 'sales.index',
            ],
        ],
    ],

    'Waste' => [
        'title' => '-$200',
        'icon' => 'fa fa-boxes',
        'route' => 'wastes.index'
    ],

    'NC' => [
        'title' => 'NC',
        'icon' => 'fa fa-file-excel-o',
        'route' => 'helper.notes'
    ],

    'logout' => [
        'title' => 'Salir',
        'icon' => 'fa fa-sign-out-alt',
        'route' => 'logout'
    ],
];
