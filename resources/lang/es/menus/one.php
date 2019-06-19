<?php

return [

    'Shoppings' => [
        'title' => 'Compras',
        'icon' => 'fa fa-archive',
        'route' => 'admin.shoppings',
    ],

    'Sales' => [
        'title' => 'Ventas',
        'icon' => 'fa fa-money',
        'submenu' => [
            'daily' => [
                'title' => 'Diarias',
                'route' => 'admin.sales'
            ],
            'monthly' => [
                'title' => 'Mensuales y Metas',
                'route' => 'admin.goals'
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
            'GaleTux' => [
                'title' => 'Gale Tuxtla',
                'route' => ['admin.public', 5]
            ],
            'GaleTapa' => [
                'title' => 'Gale Tapachula',
                'route' => ['admin.public', 6]
            ],
        ],
    ],

    'Expenses' => [
        'title' => 'Saldos',
        'icon' => 'fa fa-file-invoice-dollar',
        'route' => 'admin.balances',
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
        'title' => 'Prestamos',
        'icon' => 'fa fa-random',
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
            'create' => [
                'title' => 'Agregar',
                'route' => 'employers.create'
            ],
            'index' => [
                'title' => 'Listado',
                'route' => 'admin.employers'
            ],
        ],
    ],

    'B2B' => [
        'title' => 'B2B',
        'icon' => 'fas fa-hands-helping',
        'submenu' => [
            'binnacle' => [
                'title' => 'Bitacora',
                'route' => 'admin.binnacles',
            ],
            'client' => [
                'title' => 'Clientes',
                'route' => 'clients.index',
            ],
        ],
    ],

    'Notes' => [
        'title' => 'NC',
        'icon' => 'fa fa-file-excel-o',
        'route' => 'admin.notes',
    ],

    'Waste' => [
        'title' => '-$200',
        'icon' => 'fa fa-boxes',
        'route' => 'admin.wastes'
    ],

    'Users' => [
        'title' => 'Usuarios',
        'icon' => 'fa fa-user',
        'route' => 'users.index',
    ],
];
