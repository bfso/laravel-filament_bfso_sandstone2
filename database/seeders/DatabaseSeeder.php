<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\user;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\deparment::create([
            'name' => 'asdf'
        ]);

        $user = \App\Models\User::create([
            'email'=>'admin@bfo.ch',
            'name'=>'admin@bfo.ch',
            'password'=>Hash::make('bfo12345'),
            'department'=>1,
        ]);
    }
}
