<?php

return [
    'Shoppings' => [
        'title' => 'Compras',
        'icon' => 'fa fa-archive',
        'route' => 'shoppings.index'
    ],

    'Sales' => [
        'title' => 'Ventas',
        'icon' => 'fa fa-money',
        'route' => 'sales.index'
    ],

    'checkups' => [
        'title' => 'Arqueo',
        'icon' => 'fa fa-cash-register',
        'submenu' => [
            'create' => [
                'title' => 'Agregar',
                'route' => 'checkup.create'
            ],
            'index' => [
                'title' => 'Listado',
                'route' => 'checkup.index'
            ]
        ],
    ],

    'Expenses' => [
        'title' => 'Gastos',
        'icon' => 'fa fa-file-invoice-dollar',
        'route' => 'checks.index',
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
