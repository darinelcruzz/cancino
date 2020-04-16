<?php

return [

    'Shoppings' => [
        'title' => 'Compras',
        'icon' => 'fa fa-archive',
        'submenu' => [
            'manager' => [
                'title' => 'Tienda',
                'route' => 'shoppings.index',
            ],
            'admin' => [
                'title' => 'Admin',
                'route' => 'admin.shoppings',
            ],
        ],
    ],

    'Commisions' => [
        'title' => 'Comisiones',
        'icon' => 'fa fa-archive',
        'submenu' => [
            'create' => [
                'title' => 'Lista',
                'route' => 'commision.index',
            ],
        ],
    ],

    'B2B' => [
        'title' => 'B2B',
        'icon' => 'fas fa-hands-helping',
        'submenu' => [
            'Binnacle' => [
                'title' => 'Bitacora',
                'route' => 'binnacles.index',
            ],
            'Clients' => [
                'title' => 'Clientes',
                'route' => 'clients.index',
            ],
            'Admin' => [
                'title' => 'Admin',
                'route' => 'admin.binnacles',
            ],
            'Public' => [
                'title' => 'Depositos',
                'route' => 'admin.deposits',
            ],
        ],
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
            'Goals' => [
                'title' => 'Metas Tienda',
                'route' => 'goals.index',
            ],
            'GoalsAdmin' => [
                'title' => 'Metas Admin',
                'route' => 'admin.goals',
            ],
            'Public' => [
                'title' => 'Graficas',
                'route' => 'admin.public',
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
        'submenu' => [
            'Store' => [
                'title' => 'Tienda',
                'route' => 'notes.index',
            ],
            'Admin' => [
                'title' => 'Admin',
                'route' => 'admin.notes',
            ],
        ],
    ],

    'Expenses' => [
        'title' => 'Gastos',
        'icon' => 'fa fa-money',
        'submenu' => [
            'Store' => [
                'title' => 'Tienda',
                'route' => 'expenses.index',
            ],
            'Admin' => [
                'title' => 'Admin',
                'route' => 'admin.balances',
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
