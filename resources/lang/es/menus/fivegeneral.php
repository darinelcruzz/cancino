<?php

return [

    'Shoppings' => [
        'title' => 'Compras',
        'icon' => 'fa fa-archive',
        'label' => pendingShoppings() > 0 ? pendingShoppings(): '',
        'route' => 'shoppings.index',
    ],

    'Checkups' => [
        'title' => 'Arqueos',
        'label' => pendingCheckupsAll(),
        'icon' => 'fa fa-cash-register',
        'route' => 'helper.checkups'
    ],

    'Notes' => [
        'title' => 'Notas',
        'icon' => 'fa fa-file-excel-o',
        'label' => pendingNotesAll() > 0 ? pendingNotesAll(): '',
        'route' => 'notes.index',
    ],

    'bank_accounts' => [
        'title' => 'Bancos',
        'icon' => 'fa fa-university',
        'submenu' => [
            'admin' => [
                'title' => 'Chequeras',
                 'route' => 'terminal.index'
            ],
            'accounts' => [
                'title' => 'Movimientos',
                'route' => 'stores.index',
            ],
        ],
    ],

    'services' => [
        'title' => 'Servicios',
        'icon' => 'fa fa-file',
        'label' => ['warning' => pendingServices() > 0 ? pendingServices(): '', 'danger' => expiredServices() > 0 ? expiredServices(): ''],
        'route' => 'services.index',
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

    'Employers' => [
        'title' => 'Empleados',
        'icon' => 'fa fa-users',
        'route' => 'employers.index'
    ],

    'taken_products' => [
        'title' => 'En uso',
        'icon' => 'fa fa-car-battery',
        'label' => takenProducts() > 0 ? takenProducts(): '',
        'route' => 'taken_products.index'
    ],

    'logout' => [
        'title' => 'Salir',
        'icon' => 'fa fa-sign-out-alt',
        'route' => 'logout'
    ],
];
