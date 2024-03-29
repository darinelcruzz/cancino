<?php

return [

    'Shoppings' => [
        'title' => 'Compras',
        'icon' => 'fa fa-archive',
        'route' => 'shoppings.index',
    ],

    'Sales' => [
        'title' => 'Ventas',
        'icon' => 'fa fa-money',
        'label' => pendingDepositsAll(),
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
                'title' => 'Gráficas',
                'route' => 'admin.public',
            ],
            'Deposits' => [
                'title' => 'Depósitos',
                'route' => 'admin.deposits',
            ],
        ],
    ],

    'Employers' => [
        'title' => 'Empleados',
        'icon' => 'fa fa-users',
        'submenu' => [
            'index' => [
                'title' => 'Listado',
                'route' => 'admin.employers'
            ],
            'debs' => [
                'title' => 'Deudas',
                'route' => 'debts.index'
            ],
        ],
    ],

    'Expenses' => [
        'title' => 'Saldos',
        'icon' => 'fa fa-file-invoice-dollar',
        'route' => 'account_movements.choose'
    ],

    'Checklist' => [
        'title' => 'Hoja de visita',
        'icon' => 'fa fa-clipboard',
        'route' => 'admin.checklist'
    ],

    'Documents' => [
        'title' => 'Documentos',
        'icon' => 'fa fa-folder',
        'route' => 'documents.index',
    ],

    'NC' => [
        'title' => 'NC',
        'icon' => 'fa fa-file-excel-o',
        'route' => 'admin.notes'
    ],

    'logout' => [
        'title' => 'Salir',
        'icon' => 'fa fa-sign-out-alt',
        'route' => 'logout'
    ],
];
