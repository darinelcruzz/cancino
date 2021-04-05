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
            ],
            'transfers' => [
                'title' => 'Transferencias y cheques',
                'route' => 'checkup.transfers'
            ],
        ],
    ],

    'NC' => [
        'title' => 'NC',
        'icon' => 'fa fa-file-excel',
        'label' => pendingNotes() > 0 ? pendingNotes() : '',
        'route' => 'notes.index'
    ],

    'Employers' => [
        'title' => 'Empleados',
        'icon' => 'fa fa-users',
        'route' => 'employers.index',
    ],

    'Loans' => [
        'title' => 'Préstamos',
        'icon' => 'fa fa-random',
        'label' => pendingLoans() > 0 ? pendingLoans() : '',
        'submenu' => [
            'current' => [
                'title' => 'Actuales',
                'route' => 'loans.groups'
            ],
            'past' => [
                'title' => 'Anteriores',
                'route' => 'loans.index'
            ],
        ],
    ],

    'Documents' => [
        'title' => 'Documentos',
        'icon' => 'fa fa-folder',
        'route' => 'documents.index',
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
