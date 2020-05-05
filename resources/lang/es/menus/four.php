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
        'label' => pendingDeposits(),
        'submenu' => [
            'total' => [
                'title' => 'Depósitos',
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

    'Checklist' => [
        'title' => 'Hoja de visita',
        'icon' => 'fa fa-clipboard',
        'route' => ['checklists.index', auth()->user()->store_id]
    ],

    'Documents' => [
        'title' => 'Documentos',
        'icon' => 'fa fa-folder',
        'route' => 'documents.index'
    ],

    'Expenses' => [
        'title' => 'Gastos',
        'icon' => 'fa fa-file-invoice-dollar',
        'route' => 'expenses.index'
    ],

    'NC' => [
        'title' => 'NC',
        'icon' => 'fa fa-file-excel',
        'label' => pendingNotes(),
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
        'label' => pendingLoans(),
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

    'Equipments' => [
        'title' => 'Equipos',
        'icon' => 'fa fa-toolbox',
        'route' => 'equipments.index',
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
