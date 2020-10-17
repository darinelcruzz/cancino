<?php

return [
    'inventory' => [
        'title' => 'Inventario',
        'icon' => 'fa fa-people-carry',
        'route' => 'inventory.create'
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

    'index' => [
        'title' => 'Historial',
        'icon' => 'fa fa-search-location',
        'route' => 'count.index'
    ],

    'logout' => [
        'title' => 'Salir',
        'icon' => 'fa fa-sign-out-alt',
        'route' => 'logout'
    ],
];
