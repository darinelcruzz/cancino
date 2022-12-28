<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ExpensesTableSeeder extends Seeder
{
    function run()
    {
        factory(\App\Expense::class)->create([
            'store_id' => 1
        ]);
        factory(\App\Expense::class)->create([
            'store_id' => 2
        ]);
        factory(\App\Expense::class)->create([
            'store_id' => 3
        ]);
        factory(\App\Expense::class)->create([
            'store_id' => 4
        ]);
        factory(\App\Expense::class)->create([
            'store_id' => 5
        ]);
        factory(\App\Expense::class)->create([
            'store_id' => 6
        ]);

    }
}
