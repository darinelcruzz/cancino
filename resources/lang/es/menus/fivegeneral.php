<?php

return [

    'Shoppings' => [
        'title' => 'Compras',
        'icon' => 'fa fa-archive',
        'label' => pendingShoppings(),
        'route' => 'helper.shoppings'
    ],

    'Checkups' => [
        'title' => 'Arqueos',
        'label' => pendingCheckupsAll(),
        'icon' => 'fa fa-cash-register',
        'route' => 'helper.checkups'
    ],
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
        'route' => 'helper.tasks'
    ],

    'Employers' => [
        'title' => 'Empleados',
        'icon' => 'fa fa-users',
        'route' => 'helper.employers'
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
