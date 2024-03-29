<?php

return [

    'Shoppings' => [
        'title' => 'Compras',
        'icon' => 'fa fa-archive',
        'label' => ['danger' => undefinedShoppings() > 0 ? undefinedShoppings(): '', 'warning' => pendingShoppings() > 0 ? pendingShoppings() : '', 'primary' => printedShoppings() > 0 ? printedShoppings() : ''],
        'route' => 'shoppings.index',
    ],

    'Sales' => [
        'title' => 'Ventas',
        'icon' => 'fa fa-money',
        'submenu' => [
            'Store' => [
                'title' => 'Tienda',
                'route' => 'sales.index',
            ],
            'Admin' => [
                'title' => 'Admin',
                'route' => 'admin.sales',
            ],
            'Public' => [
                'title' => 'Depositos',
                'route' => 'admin.deposits',
            ],
            'Goals' => [
                'title' => 'Metas Tienda',
                'route' => 'goals.index',
            ],
            'GoalsAdmin' => [
                'title' => 'Metas Admin',
                'route' => 'admin.goals',
            ],
            'Charts' => [
                'title' => 'Graficas',
                'route' => 'admin.public',
            ],
            'transfers' => [
                'title' => 'Transferencias y cheques',
                'route' => 'checkup.transfers'
            ],
        ],
    ],

    'Tasks' => [
        'title' => 'Pendientes',
        'icon' => 'fa fa-calendar-check',
        'route' => 'admin.tasks'
    ],

    'Checklist' => [
        'title' => 'Lista visita',
        'icon' => 'fa fa-clipboard-list',
        'submenu' => [
            'Store' => [
                'title' => 'Tienda',
                'route' => ['checklists.index', 2],
            ],
            'Admin' => [
                'title' => 'Admin',
                'route' => 'admin.checklist',
            ],
        ],
    ],

    'checks' => [
        'title' => 'Chequera',
        'icon' => 'fa fa-money-check',
        'submenu' => [
            'checks' => [
                'title' => 'Tienda',
                'route' => 'checks.index',
            ],
            'admin' => [
                'title' => 'Admin',
                'route' => 'account_movements.choose',
            ],
            'accounts' => [
                'title' => 'Cuentas',
                'route' => 'stores.index',
            ],
        ],
    ],

    'Commisions' => [
        'title' => 'Comisiones',
        'icon' => 'fa fa-handshake',
        'submenu' => [
            'index' => [
                'title' => 'Lista',
                'route' => 'commision.index',
            ],
            'Chiapas' => [
                'title' => 'Chiapas',
                'route' => ['commision.show', 2]
            ],
            'Soconusco' => [
                'title' => 'Soconusco',
                'route' => ['commision.show', 3]
            ],
            'Altos' => [
                'title' => 'Altos',
                'route' => ['commision.show', 4]
            ],
            'GaleTux' => [
                'title' => 'Gale Tuxtla',
                'route' => ['commision.show', 5]
            ],
            'GaleTapa' => [
                'title' => 'Gale Tapa',
                'route' => ['commision.show', 6]
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

    'Employers' => [
        'title' => 'Empleados',
        'icon' => 'fa fa-users',
        'submenu' => [
            'create' => [
                'title' => 'Agregar',
                'route' => 'employers.create'
            ],
            'index' => [
                'title' => 'Listado',
                'route' => 'employers.index'
            ],
            'admin' => [
                'title' => 'Admin',
                'route' => 'admin.employers'
            ],
            'debs' => [
                'title' => 'Deudas',
                'route' => 'debts.index'
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
        'submenu' => [
            'Store' => [
                'title' => 'Tienda',
                'route' => 'loans.index',
            ],
            'invoices' => [
                'title' => 'Facturas',
                'route' => 'admin.invoices'
            ],
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
            'comitan' => [
                'title' => 'Comitán',
                'route' => ['admin.loans', 7]
            ],
            'sancris' => [
                'title' => 'San Cristóbal',
                'route' => ['admin.loans', 9]
            ],
            'tonala' => [
                'title' => 'Tonalá',
                'route' => ['admin.loans', 11]
            ],
        ],
    ],

    'Notes' => [
        'title' => 'Notas',
        'icon' => 'fa fa-file-excel-o',
        'route' => 'notes.index',
    ],

    'Equipments' => [
        'title' => 'Equipos',
        'icon' => 'fa fa-toolbox',
        'route' => 'admin.equipments',
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
            'transfers' => [
                'title' => 'Transferencias',
                'route' => 'supplies.transfers.index'
            ],
            'products' => [
                'title' => 'Productos',
                'route' => 'supplies.index'
            ],
        ],
    ],

    'taken_products' => [
        'title' => 'En uso',
        'icon' => 'fa fa-car-battery',
        'label' => takenProducts() > 0 ? takenProducts(): '',
        'route' => 'admin.taken_products'
    ],

    'Inventory' => [
        'title' => 'Inventarios',
        'icon' => 'fa fa-people-carry',
        'submenu' => [
            'new' => [
                'title' => 'Nuevo',
                'route' => 'inventory.create'
            ],
            'create' => [
                'title' => 'Agregar normal',
                'route' => ['count.create', 'normal']
            ],
            'create2' => [
                'title' => 'Agregar con código de barras',
                'route' => ['count.create', 'codigo-de-barras']
            ],
            'index' => [
                'title' => 'Conteos',
                'route' => 'count.index'
            ],
            'products' => [
                'title' => 'Productos',
                'route' => 'product.index'
            ],
            'uploads' => [
                'title' => 'Excel',
                'route' => 'inventory.upload'
            ],
            'locations' => [
                'title' => 'Ubicaciones',
                'route' => 'location.create'
            ],
            'partials' => [
                'title' => 'Parciales',
                'route' => 'inventory.partial.index'
            ],
        ],
    ],

    'Clients' => [
        'title' => 'Clientes',
        'icon' => 'fas fa-hands-helping',
        'submenu' => [
            'index' => [
                'title' => 'Lista',
                'route' => 'clients.index',
            ],
            'create' => [
                'title' => 'Agregar',
                'route' => 'clients.create',
            ],
        ],
    ],

    'Users' => [
        'title' => 'Usuarios',
        'icon' => 'fa fa-user',
        'route' => 'users.index',
        'noti' => '.'
    ],
];
