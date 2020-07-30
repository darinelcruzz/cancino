<?php

return [

    'Shoppings' => [
        'title' => 'Compras',
        'icon' => 'fa fa-archive',
        'label' => pendingShoppings() > 0 ? pendingShoppings(): '',
        'route' => 'shoppings.index',
    ],

    // 'covid' => [
    //     'title' => 'Covid',
    //     'icon' => 'fa fa-medkit',
    //     'label' => evaluationImssEmployeesAll() > 0 ? evaluationImssEmployeesAll(): '',
    //     'submenu' => [
    //         'imss' => [
    //             'title' => 'IMSS',
    //             'route' => 'covid.imss',
    //         ],
    //     ],
    // ],

    'Sales' => [
        'title' => 'Ventas',
        'icon' => 'fa fa-money',
        'label' => ['danger' => pendingDepositsAll() > 0 ? pendingDepositsAll(): '', 'primary' => uncheckedCheckups()],
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
            'transfers' => [
                'title' => 'Transferencias y cheques',
                'route' => 'checkup.transfers'
            ],
            'terminal' => [
                'title' => 'Terminales',
                'route' => 'admin.terminals'
            ],
        ],
    ],

    'admin' => [
        'title' => 'Admin',
        'label' => pendingTasksAll() > 0 ? pendingTasksAll(): '',
        'icon' => 'fa fa-eye',
        'submenu' => [
            'tasks' => [
                'title' => 'Pendientes',
                'route' => 'admin.tasks'
            ],
            'services' => [
                'title' => 'Servicios',
                'route' => 'services.index',
            ],
            'websites' => [
                'title' => 'Portales',
                'route' => 'websites.index',
            ],
        ],
    ],

    'Checklist' => [
        'title' => 'Hoja de visita',
        'icon' => 'fa fa-clipboard-list',
        'route' => 'admin.checklist'
    ],

    'bank_accounts' => [
        'title' => 'Bancos',
        'icon' => 'fa fa-university',
        'submenu' => [
            'expenses' => [
                'title' => 'Gerentes',
                'route' => 'account_movements.choose',
            ],
            'accounts' => [
                'title' => 'Cuentas',
                'route' => 'stores.index',
            ],
            'terminal' => [
                'title' => 'Chequeras',
                 'route' => 'terminal.index'
            ],
            'providers' => [
                'title' => 'Grupos y proveedores',
                 'route' => 'providers.index'
            ],
        ],
    ],

    'Commisions' => [
        'title' => 'Comisiones',
        'icon' => 'fa fa-handshake',
        'route' => 'commision.index',
    ],

    'Employees' => [
        'title' => 'Empleados',
        'label' => evaluationEmployeeAll() > 0 ? evaluationEmployeeAll(): '',
        'icon' => 'fa fa-users',
        'submenu' => [
            'index' => [
                'title' => 'Listado',
                'route' => 'employers.index'
            ],
            'debs' => [
                'title' => 'Deudas',
                'route' => 'debts.index'
            ],
        ],
    ],

    'supplies' => [
        'title' => 'Insumos',
        'icon' => 'fa fa-broom',
        'submenu' => [
            'sales' => [
                'title' => 'Ventas',
                'route' => 'supplies.sales.index'
            ],
            'purchases' => [
                'title' => 'Compras',
                'route' => 'supplies.purchases.index'
            ],
            'products' => [
                'title' => 'Productos',
                'route' => 'supplies.index'
            ],
        ],
    ],

    'Documents' => [
        'title' => 'Documentos',
        'icon' => 'fa fa-folder',
        'submenu' => [
            'create' => [
                'title' => 'Lista',
                'route' => 'documents.index',
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

    'Notes' => [
        'title' => 'Notas',
        'icon' => 'fa fa-file-excel-o',
        'label' => pendingNotesAll() > 0 ? pendingNotesAll(): '',
        'route' => 'notes.index',
    ],

    'Equipments' => [
        'title' => 'Equipos',
        'icon' => 'fa fa-toolbox',
        'route' => 'admin.equipments',
    ],

    'Waste' => [
        'title' => '-$200',
        'icon' => 'fa fa-boxes',
        'label' => pendingWastes() > 0 ? pendingWastes(): '',
        'route' => 'admin.wastes'
    ],

    'Inventory' => [
        'title' => 'Inventarios',
        'icon' => 'fa fa-people-carry',
        'submenu' => [
            'create' => [
                'title' => 'Agregar',
                'route' => 'count.create'
            ],
            'index' => [
                'title' => 'Conteos',
                'route' => 'count.index'
            ],
            'products' => [
                'title' => 'Productos',
                'route' => 'product.index'
            ],
            'locations' => [
                'title' => 'Ubicaciones',
                'route' => 'location.create'
            ],
        ],
    ],

    'Clients' => [
        'title' => 'Lista',
        'icon' => 'fas fa-hands-helping',
        'route' => 'clients.index',
    ],

    'Users' => [
        'title' => 'Usuarios',
        'icon' => 'fa fa-user',
        'route' => 'users.index',
    ],
];
