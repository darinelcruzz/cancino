<?php

return [
    'NC' => [
        'title' => 'NC',
        'label' => pendingNotesAll(),
        'icon' => 'fa fa-file-excel-o',
        'route' => 'helper.notes'
    ],

    'Tasks' => [
        'title' => 'Pendientes',
        'label' => pendingTasksAll(),
        'icon' => 'fa fa-tasks',
        'route' => 'tasks.index'
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
                'route' => 'helper.employers'
            ],
        ],
    ],

    'Waste' => [
        'title' => '-$200',
        'icon' => 'fa fa-boxes',
        'route' => 'wastes.index'
    ],

    'logout' => [
        'title' => 'Salir',
        'icon' => 'fa fa-sign-out-alt',
        'route' => 'logout'
    ],
];
