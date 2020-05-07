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

    'Expenses' => [
        'title' => 'Gastos',
        'icon' => 'fa fa-file-invoice-dollar',
        'route' => 'helper.expenses'
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
        'label' => pendingWastes() > 0 ? pendingWastes(): '',
        'route' => 'helper.wastes'
    ],

    'logout' => [
        'title' => 'Salir',
        'icon' => 'fa fa-sign-out-alt',
        'route' => 'logout'
    ],
];
