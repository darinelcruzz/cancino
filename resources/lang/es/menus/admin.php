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
            'Store' => [
                'title' => 'Tienda',
                'route' => 'checks.index',
            ],
            'Admin' => [
                'title' => 'Admin',
                'route' => 'account_movements.choose',
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
                'route' => ['commision.create', 2]
            ],
            'Soconusco' => [
                'title' => 'Soconusco',
                'route' => ['commision.create', 3]
            ],
            'Altos' => [
                'title' => 'Altos',
                'route' => ['commision.create', 4]
            ],
            'GaleTux' => [
                'title' => 'Gale Tuxtla',
                'route' => ['commision.create', 5]
            ],
            'GaleTapa' => [
                'title' => 'Gale Tapa',
                'route' => ['commision.create', 6]
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
        'title' => 'Prestamos',
        'icon' => 'fa fa-random',
        'submenu' => [
            'Store' => [
                'title' => 'Tienda',
                'route' => 'loans.index',
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

    'Waste' => [
        'title' => '-$200',
        'icon' => 'fa fa-boxes',
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
