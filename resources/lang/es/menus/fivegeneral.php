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
                'route' => 'admin.sales',
            ],
            'deposits' => [
                'title' => 'Depositos',
                'route' => 'sales.index',
            ],
        ],
    ],

    'NC' => [
        'title' => 'NC',
        'icon' => 'fa fa-file-excel-o',
        'route' => 'admin.notes'
    ],

    'logout' => [
        'title' => 'Salir',
        'icon' => 'fa fa-sign-out',
        'route' => 'logout'
    ],
];