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
            'total' => [
                'title' => 'Diarias',
                'route' => 'admin.sales'
            ],
            'monthly' => [
                'title' => 'Mensuales y Metas',
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
