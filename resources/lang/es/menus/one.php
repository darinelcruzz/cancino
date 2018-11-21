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

    'Loans' => [
        'title' => 'Prestamos',
        'icon' => 'fa fa-random',
        'submenu' => [
            'Chiapas' => [
                'title' => 'Chiapas',
                'route' => ['admin.loans', 2]
            ],
            'Soconusco' => [
                'title' => 'Soconusco',
                'route' => ['admin.loans', 3]
            ],
            'Altos' => [
                'title' => 'Altos',
                'route' => ['admin.loans', 4]
            ],
            'Plaza' => [
                'title' => 'Plaza',
                'route' => ['admin.loans', 5]
            ],
        ],
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
