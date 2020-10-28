<?php

return [

    'Inventory' => [
        'title' => 'Inventarios',
        'icon' => 'fa fa-people-carry',
        'submenu' => [
            'new' => [
                'title' => 'Historial',
                'route' => 'inventory.index'
            ],
            'index' => [
                'title' => 'Conteos',
                'route' => 'count.index'
            ],
            'products' => [
                'title' => 'Productos',
                'route' => 'product.index'
            ],
            'partials' => [
                'title' => 'Parciales',
                'route' => 'inventory.partial.index'
            ],
            'locations' => [
                'title' => 'Ubicaciones',
                'route' => 'location.create'
            ],
            'upload' => [
                'title' => 'Excel',
                'route' => 'inventory.upload'
            ],
        ],
    ],

    'counts' => [
        'title' => 'Conteos',
        'icon' => 'fa fa-calculator',
        'submenu' => [

            'create' => [
                'title' => 'Agregar normal',
                'route' => ['count.create', 'normal']
            ],
            'create2' => [
                'title' => 'Agregar con código de barras',
                'route' => ['count.create', 'codigo-de-barras']
            ],
        ]
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
            'upload' => [
                'title' => 'Excel',
                'route' => 'inventory.upload'
            ],
        ],
    ],

    'logout' => [
        'title' => 'Salir',
        'icon' => 'fa fa-sign-out-alt',
        'route' => 'logout'
    ],
];
