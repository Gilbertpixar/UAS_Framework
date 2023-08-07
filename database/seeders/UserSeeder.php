<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Buat user admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('adminadmin'), 
            'role' => 'admin',
        ]);

        // Buat beberapa user biasa
        User::create([
            'name' => 'Farid Duta',
            'email' => 'duta@gigiku.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Gilbert Piero',
            'email' => 'Gilbert@gigiku.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Rheynansya Tabriz',
            'email' => 'Rhey@gigiku.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            
        ]);
        User::create([
            'name' => 'Fanni',
            'email' => 'Fanni@gigiku.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

    }
}
