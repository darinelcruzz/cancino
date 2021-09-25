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
        'label' => ['warning' => pendingServices() > 0 ? pendingServices(): '', 'primary' => printedServices() > 0 ? printedServices(): '', 'danger' => expiredServices() > 0 ? expiredServices(): ''],
        'icon' => 'fa fa-eye',
        'submenu' => [
            'services' => [
              'title' => 'Servicios',
              'route' => 'services.index',
            ],
            'tasks' => [
                'title' => 'Pendientes',
                'route' => 'admin.tasks'
            ],
            'websites' => [
                'title' => 'Portales',
                'route' => 'websites.index',
            ],
            'stores' => [
                'title' => 'Agregar tienda',
                'route' => 'stores.create',
            ],
            'homes' => [
                'title' => 'Agregar casa',
                'route' => 'homes.create',
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
            'Comitan' => [
                'title' => 'Comitán',
                'route' => ['commision.show', 7]
            ],
        ],
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
            'upload' => [
                'title' => 'Excel',
                'route' => 'inventory.upload'
            ],
            'products' => [
                'title' => 'Productos',
                'route' => 'product.index'
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
            'comitan' => [
                'title' => 'Comitán',
                'route' => ['admin.loans', 7]
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

    'taken_products' => [
        'title' => 'En uso',
        'icon' => 'fa fa-car-battery',
        'label' => takenProducts() > 0 ? takenProducts(): '',
        'route' => 'admin.taken_products'
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
