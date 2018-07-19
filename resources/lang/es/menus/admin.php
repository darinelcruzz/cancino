<?php

return [

    'Shoppings' => [
        'title' => 'Compras',
        'icon' => 'fa fa-archive',
        'submenu' => [
            'manager' => [
                'title' => 'Tienda',
                'route' => 'shoppings.index',
                'noti' => '.'
            ],
            'admin' => [
                'title' => 'Admin',
                'route' => 'admin.shoppings',
                'noti' => '.'
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
