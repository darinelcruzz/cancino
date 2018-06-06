<?php

return [

    'Shoppings' => [
        'title' => 'Compras',
        'icon' => 'fa fa-archive',
        'submenu' => [
            'manager' => [
                'title' => 'Tienda',
                'route' => 'shoppings.index'
            ],
            'admin' => [
                'title' => 'Admin',
                'route' => 'admin.shoppings'
            ],
        ],
    ],

    'Sales' => [
        'title' => 'Ventas',
        'icon' => 'fa fa-money',
        'route' => 'sales.index'
    ],

    'SalesAdmin' => [
        'title' => 'Ventas Admin',
        'icon' => 'fa fa-money',
        'route' => 'admin.sales'
    ],

    'Notes' => [
        'title' => 'NC',
        'icon' => 'fa fa-file-excel-o',
        'route' => 'notes.index'
    ],

    'NotesAdmin' => [
        'title' => 'NC Admin',
        'icon' => 'fa fa-file-excel-o',
        'route' => 'admin.notes'
    ],

    'Expenses' => [
        'title' => 'Gastos',
        'icon' => 'fa fa-money',
        'route' => 'expenses.index'
    ],
    'ExpensesAdmin' => [
        'title' => 'Saldos',
        'icon' => 'fa fa-money',
        'route' => 'admin.balances'
    ],

    'Users' => [
        'title' => 'Usuarios',
        'icon' => 'fa fa-user',
        'route' => 'users.index'
    ],
];
