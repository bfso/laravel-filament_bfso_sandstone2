<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\user;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Department::create([
            'name' => 'asdf'
        ]);

        $user = user::create([
            'email'=>'admin@bfo.ch',
            'name'=>'admin@bfo.ch',
            'password'=>Hash::make('bfo12345'),
            'department_id'=>1,
        ]);
    }
}
