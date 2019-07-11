<?php

return [
    'Shoppings' => [
        'title' => 'Compras',
        'icon' => 'fa fa-archive',
        'route' => 'shoppings.index'
    ],

    'Sales' => [
        'title' => 'Ventas',
        'icon' => 'fa fa-money-bill-alt',
        'submenu' => [
            'total' => [
                'title' => 'Depositos',
                'route' => 'sales.index'
            ],
            'public' => [
                'title' => 'Gráficas',
                'route' => 'sales.show'
            ],
            'goals' => [
                'title' => 'Metas',
                'route' => 'goals.index'
            ],
        ],
    ],

    'Documents' => [
        'title' => 'Documentos',
        'icon' => 'fa fa-folder',
        'route' => ['documents.index', 'store' . auth()->user()->store_id]
    ],


    'NC' => [
        'title' => 'NC',
        'icon' => 'fa fa-file-excel',
        'route' => 'notes.index'
    ],

    'Employers' => [
        'title' => 'Empleados',
        'icon' => 'fa fa-users',
        'route' => 'employers.index',
    ],

    'Loans' => [
        'title' => 'Prestamos',
        'icon' => 'fa fa-random',
        'route' => 'loans.index',
        'noti' => '.'
    ],

    'Equipments' => [
        'title' => 'Equipos',
        'icon' => 'fa fa-toolbox',
        'route' => 'equipments.index',
    ],

    'Expenses' => [
        'title' => 'Gastos',
        'icon' => 'fa fa-file-invoice-dollar',
        'route' => 'expenses.index'
    ],

    'Waste' => [
        'title' => '-$200',
        'icon' => 'fa fa-boxes',
        'route' => 'wastes.index'
    ],

    'logout' => [
        'title' => 'Salir',
        'icon' => 'fa fa-sign-out-alt',
        'route' => 'logout'
    ],
];
