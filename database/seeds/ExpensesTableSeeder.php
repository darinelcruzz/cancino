<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ExpensesTableSeeder extends Seeder
{
    function run()
    {
        factory(\App\Expense::class)->create([
            'check' => 0,
            'date' => '2018-01-01',
            'amount' => 200,
            'concept' => 'inicio',
            'store_id' => 1,
            'type' => 1
        ]);
        factory(\App\Expense::class)->create([
            'check' => 0,
            'date' => '2018-01-01',
            'amount' => 200,
            'concept' => 'inicio',
            'store_id' => 2,
            'type' => 1
        ]);
        factory(\App\Expense::class)->create([
            'check' => 0,
            'date' => '2018-01-01',
            'amount' => 200,
            'concept' => 'inicio',
            'store_id' => 3,
            'type' => 1
        ]);
        factory(\App\Expense::class)->create([
            'check' => 0,
            'date' => '2018-01-01',
            'amount' => 200,
            'concept' => 'inicio',
            'store_id' => 4,
            'type' => 1
        ]);
        factory(\App\Expense::class)->create([
            'check' => 0,
            'date' => '2018-01-01',
            'amount' => 200,
            'concept' => 'inicio',
            'store_id' => 5,
            'type' => 1
        ]);

    }
}
