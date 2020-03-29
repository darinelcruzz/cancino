<?php

return [

    'counts' => [
        'title' => 'Conteo',
        'icon' => 'fa fa-tasks',
        'submenu' => [
            'create' => [
                'title' => 'Agregar',
                'route' => 'count.create'
            ],
            'index' => [
                'title' => 'Historial',
                'route' => 'count.index'
            ]
        ],
    ],

    'products' => [
        'title' => 'Productos',
        'icon' => 'fa fa-tools',
        'route' => 'product.index'
    ],

    'locations' => [
        'title' => 'Ubicaciones',
        'icon' => 'fa fa-search-location',
        'route' => 'location.index'
    ],

    'logout' => [
        'title' => 'Salir',
        'icon' => 'fa fa-sign-out-alt',
        'route' => 'logout'
    ],
];
