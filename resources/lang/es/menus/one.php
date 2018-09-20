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

    'Expenses' => [
        'title' => 'Gastos',
        'icon' => 'fa fa-money',
        'route' => 'admin.balances',
    ],

    'B2B' => [
        'title' => 'B2B',
        'icon' => 'fa fa-line-chart',
        'submenu' => [
            'binnacle' => [
                'title' => 'Bitacora',
                'route' => 'admin.binnacles',
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


    'Users' => [
        'title' => 'Usuarios',
        'icon' => 'fa fa-user',
        'route' => 'users.index',
    ],
];
