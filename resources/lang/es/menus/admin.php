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
        ],
    ],

    'Public' => [
        'title' => 'Ventas Publico',
        'icon' => 'fa fa-line-chart',
        'submenu' => [
            'Chiapas' => [
                'title' => 'Chiapas',
                'route' => ['admin.public', 2]
            ],
            'Soconusco' => [
                'title' => 'Soconusco',
                'route' => ['admin.public', 3]
            ],
            'Altos' => [
                'title' => 'Altos',
                'route' => ['admin.public', 4]
            ],
            'Plaza' => [
                'title' => 'Plaza',
                'route' => ['admin.public', 5]
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
            'Plaza' => [
                'title' => 'Plaza',
                'route' => ['admin.loans', 5]
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
