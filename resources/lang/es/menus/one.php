<?php

return [

    'Shoppings' => [
        'title' => 'Compras',
        'icon' => 'fa fa-archive',
        'label' => pendingShoppings() > 0 ? pendingShoppings(): '',
        'route' => 'admin.shoppings',
    ],

    'Sales' => [
        'title' => 'Ventas',
        'icon' => 'fa fa-money',
        'label' => pendingDepositsAll() > 0 ? pendingDepositsAll(): '',
        'submenu' => [
            'Deposits' => [
                'title' => 'Depósitos',
                'route' => 'admin.deposits',
            ],
            'Daily' => [
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
            'Checkups' => [
                'title' => 'Arqueos',
                'route' => 'admin.checkups'
            ],
        ],
    ],

    'Tasks' => [
        'title' => 'Pendientes',
        'label' => pendingTasksAll() > 0 ? pendingTasksAll(): '',
        'icon' => 'fa fa-tasks',
        'route' => 'admin.tasks'
    ],

    'Checklist' => [
        'title' => 'Hoja de visita',
        'icon' => 'fa fa-clipboard',
        'route' => 'admin.checklist'
    ],

    'Expenses' => [
        'title' => 'Gastos',
        'icon' => 'fa fa-file-invoice-dollar',
        'submenu' => [
            'balances' => [
                'title' => 'Saldos',
                'route' => 'admin.balances',
            ],
            'expenses' => [
                'title' => 'Chequeras',
                'route' => 'admin.expenses',
            ],
        ],
    ],

    'Documents' => [
        'title' => 'Documentos',
        'icon' => 'fa fa-folder',
        'route' => 'admin.documents',
    ],

    'Documents' => [
        'title' => 'Documentos',
        'icon' => 'fa fa-folder',
        'submenu' => [
            'create' => [
                'title' => 'Lista',
                'route' => 'admin.documents',
            ],
            'index' => [
                'title' => 'Agregar',
                'route' => 'documents.create'
            ],
        ],
    ],

    'Loans' => [
        'title' => 'Préstamos',
        'icon' => 'fa fa-random',
        'label' => pendingInvoices() > 0 ? pendingInvoices(): '',
        'submenu' => [
            'Chiapas' => [
                'title' => 'Chiapas',
                'route' => ['admin.loans', 2]
            ],
            'Soconusco' => [
                'title' => 'Soconusco',
                'route' => ['admin.loans', 3]
            ],
            'Altos' => [
                'title' => 'Altos',
                'route' => ['admin.loans', 4]
            ],
            'GaleTux' => [
                'title' => 'Gale Tuxtla',
                'route' => ['admin.loans', 5]
            ],
            'GaleTapa' => [
                'title' => 'Gale Tapa',
                'route' => ['admin.loans', 6]
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

    'B2B' => [
        'title' => 'B2B',
        'icon' => 'fas fa-hands-helping',
        'submenu' => [
            'client' => [
                'title' => 'Clientes',
                'route' => 'clients.index',
            ],
        ],
    ],

    'Equipments' => [
        'title' => 'Equipos',
        'icon' => 'fa fa-toolbox',
        'route' => 'admin.equipments',
    ],

    'Notes' => [
        'title' => 'NC',
        'icon' => 'fa fa-file-excel-o',
        'label' => pendingNotesAll() > 0 ? pendingNotesAll(): '',
        'route' => 'admin.notes',
    ],

    'Waste' => [
        'title' => '-$200',
        'icon' => 'fa fa-boxes',
        'label' => pendingWastes() > 0 ? pendingWastes(): '',
        'route' => 'admin.wastes'
    ],

    'Users' => [
        'title' => 'Usuarios',
        'icon' => 'fa fa-user',
        'route' => 'users.index',
    ],
];
