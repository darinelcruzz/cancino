<?php

return [

    'Shoppings' => [
        'title' => 'Compras',
        'icon' => 'fa fa-archive',
        'route' => 'admin.shoppings',
    ],

    'Sales' => [
        'title' => 'Ventas',
        'icon' => 'fa fa-money',
        'route' => 'admin.sales',
    ],

    'B2B' => [
        'title' => 'B2B',
        'icon' => 'fa fa-line-chart',
        'submenu' => [
            'binnacle' => [
                'title' => 'Bitacora',
                'route' => 'binnacles.index',
            ],
            'client' => [
                'title' => 'Clientes',
                'route' => 'clients.index',
            ],
        ],
    ],

    'Notes' => [
        'title' => 'NC',
        'icon' => 'fa fa-file-excel-o',
        'route' => 'admin.notes',
    ],

    'Expenses' => [
        'title' => 'Saldos',
        'icon' => 'fa fa-money',
        'route' => 'admin.balances',
    ],

    'Users' => [
        'title' => 'Usuarios',
        'icon' => 'fa fa-user',
        'route' => 'users.index',
    ],
];
