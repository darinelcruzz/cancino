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
        ],
    ],

    'Sales' => [
        'title' => 'Ventas',
        'icon' => 'fa fa-money',
        'route' => 'sales.index',
        'noti' => '.'
    ],

    'SalesAdmin' => [
        'title' => 'Ventas Admin',
        'icon' => 'fa fa-money',
        'route' => 'admin.sales',
        'noti' => '.'
    ],

    'Loans' => [
        'title' => 'Prestamos',
        'icon' => 'fa fa-random',
        'route' => 'loans.index',
        'noti' => '.'
    ],

    'Notes' => [
        'title' => 'NC',
        'icon' => 'fa fa-file-excel-o',
        'route' => 'notes.index',
        'noti' => '.'
    ],

    'NotesAdmin' => [
        'title' => 'NC Admin',
        'icon' => 'fa fa-file-excel-o',
        'route' => 'admin.notes',
        'noti' => '.'
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
