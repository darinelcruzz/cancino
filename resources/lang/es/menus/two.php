<?php

return [

    'Shoppings' => [
        'title' => 'Compras',
        'icon' => 'fa fa-archive',
        'route' => 'admin.shoppings'
    ],

    'Sales' => [
        'title' => 'Ventas',
        'icon' => 'fa fa-money',
        'submenu' => [
            'Total' => [
                'title' => 'Diarias',
                'route' => 'admin.sales'
            ],
            'Monthly' => [
                'title' => 'Mensuales y Metas',
                'route' => 'admin.goals'
            ],
            'Public' => [
                'title' => 'Graficas',
                'route' => 'admin.public',
            ],
            'Deposits' => [
                'title' => 'Depositos',
                'route' => 'admin.deposits',
            ],
        ],
    ],

    'Employers' => [
        'title' => 'Empleados',
        'icon' => 'fa fa-users',
        'route' => 'admin.employers',
    ],

    'Documents' => [
        'title' => 'Documentos',
        'icon' => 'fa fa-folder',
        'route' => 'admin.documents',
    ],

    'NC' => [
        'title' => 'NC',
        'icon' => 'fa fa-file-excel-o',
        'route' => 'admin.notes'
    ],

    'Expenses' => [
        'title' => 'Saldos',
        'icon' => 'fa fa-file-invoice-dollar',
        'route' => 'admin.balances'
    ],

    'logout' => [
        'title' => 'Salir',
        'icon' => 'fa fa-sign-out-alt',
        'route' => 'logout'
    ],
];
