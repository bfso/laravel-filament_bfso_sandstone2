<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['name' => 'John', 'email' => 'john.doe@example.com', 'password' => 'password123', 'department' => 1],
            ['name' => 'Jane', 'email' => 'jane.smith@example.com', 'password' => 'letmein', 'department' => 2],
            ['name' => 'Michael', 'email' => 'michael.johnson@example.com', 'password' => 'securepass', 'department' => 3],
            ['name' => 'Emily', 'email' => 'emily.brown@example.com', 'password' => 'password123', 'department' => 1],
            ['name' => 'David', 'email' => 'david.davis@example.com', 'password' => 'p@ssw0rd', 'department' => 2],
            ['name' => 'Sarah', 'email' => 'sarah.wilson@example.com', 'password' => 'qwerty', 'department' => 3],
        ]);
    }
}
