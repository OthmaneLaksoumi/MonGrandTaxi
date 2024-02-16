<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Laksoumi Othmane',
        //     'email' => 'laksoumi.ot@gmail.com',
        //     'password' => '1',
        //     'phone' => '0642653020',
        //     'role' => 'passenger',
        // ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Hamid Hamid',
        //     'email' => 'hamid@gmail.com',
        //     'password' => '1',
        //     'phone' => '0643653020',
        //     'role' => 'passenger',
        // ]);

    }
}
