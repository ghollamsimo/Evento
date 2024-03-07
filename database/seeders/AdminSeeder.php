<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [

                'name' => 'Admin',
                'email' => 'admin@youcode.ma',
                'password' => 'admin@youcode.ma',
                'role' => Hash::make('Admin')

        ];

        User::insert($admin);
    }
}
