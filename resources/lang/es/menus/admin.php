<?php

return [

    'Shoppings' => [
        'title' => 'Compras',
        'icon' => 'fa fa-archive',
        'submenu' => [
            'manager' => [
                'title' => 'Tienda',
                'route' => 'shoppings.index',
            ],
            'admin' => [
                'title' => 'Admin',
                'route' => 'admin.shoppings',
            ],
        ],
    ],

    'B2B' => [
        'title' => 'B2B',
        'icon' => 'fa fa-line-chart',
        'submenu' => [
            'Binnacle' => [
                'title' => 'Bitacora',
                'route' => 'binnacles.index',
            ],
            'Clients' => [
                'title' => 'Clientes',
                'route' => 'clients.index',
            ],
            'Admin' => [
                'title' => 'Admin',
                'route' => 'admin.binnacles',
            ],
        ],
    ],

    'Sales' => [
        'title' => 'Ventas',
        'icon' => 'fa fa-money',
        'submenu' => [
            'Store' => [
                'title' => 'Tienda',
                'route' => 'sales.index',
            ],
            'Goals' => [
                'title' => 'Metas',
                'route' => 'goals.create',
            ],
            'Admin' => [
                'title' => 'Admin',
                'route' => 'admin.sales',
            ],
        ],
    ],

    'Loans' => [
        'title' => 'Prestamos',
        'icon' => 'fa fa-random',
        'route' => 'loans.index',
        'noti' => '.'
    ],

    'Notes' => [
        'title' => 'Notas',
        'icon' => 'fa fa-file-excel-o',
        'submenu' => [
            'Store' => [
                'title' => 'Tienda',
                'route' => 'notes.index',
            ],
            'Admin' => [
                'title' => 'Admin',
                'route' => 'admin.notes',
            ],
        ],
    ],

    'Expenses' => [
        'title' => 'Gastos',
        'icon' => 'fa fa-money',
        'route' => 'expenses.index',
        'noti' => '.'
    ],
    'ExpensesAdmin' => [
        'title' => 'Saldos',
        'icon' => 'fa fa-money',
        'route' => 'admin.balances',
        'noti' => '.'
    ],

    'Users' => [
        'title' => 'Usuarios',
        'icon' => 'fa fa-user',
        'route' => 'users.index',
        'noti' => '.'
    ],
];
