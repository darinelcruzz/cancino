<?php

return [
    'Sales' => [
        'title' => 'Ventas',
        'icon' => 'fa fa-money',
        'route' => 'admin.sales',
    ],

    'Binnacle' => [
        'title' => 'Bitacora',
        'icon' => 'fa fa-list',
        'route' => 'admin.binnacles'
    ],

    'Clients' => [
        'title' => 'Clientes',
        'icon' => 'fa fa-handshake-o',
        'route' => 'clients.index'
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

    'logout' => [
        'title' => 'Salir',
        'icon' => 'fa fa-sign-out-alt',
        'route' => 'logout'
    ],
];
