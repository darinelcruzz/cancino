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

    'Sales' => [
        'title' => 'Ventas',
        'icon' => 'fa fa-money',
        'submenu' => [
            'total' => [
                'title' => 'Generales',
                'route' => 'admin.sales'
            ],
            'public' => [
                'title' => 'Público',
                'route' => 'admin.sales'
            ],
            'goals' => [
                'title' => 'Metas',
                'route' => 'admin.goals'
            ],
        ],
    ],

    'Public' => [
        'title' => 'Ventas Publico',
        'icon' => 'fa fa-line-chart',
        'submenu' => [
            'Chiapas' => [
                'title' => 'Chiapas',
                'route' => ['admin.public', 2]
            ],
            'Soconusco' => [
                'title' => 'Soconusco',
                'route' => ['admin.public', 3]
            ],
            'Altos' => [
                'title' => 'Altos',
                'route' => ['admin.public', 4]
            ],
            'Plaza' => [
                'title' => 'Plaza',
                'route' => ['admin.public', 5]
            ],
        ],
    ],

    'Expenses' => [
        'title' => 'Saldos',
        'icon' => 'fa fa-file-invoice-dollar',
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
        'icon' => 'fas fa-hands-helping',
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

    'Waste' => [
        'title' => '-$200',
        'icon' => 'fa fa-boxes',
        'route' => 'admin.wastes'
    ],

    'Users' => [
        'title' => 'Usuarios',
        'icon' => 'fa fa-user',
        'route' => 'users.index',
    ],
];
