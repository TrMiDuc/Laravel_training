<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::unguard();

        User::create([
            'email' => 'admin@123',
            'password' => bcrypt('123456'),
            'fname' => 'John',
            'lname' => 'Doe',
            'live_at'=> 'abc',
            'phone'=> '011112121',
            'username' => 'johndoe',
            'role'=> 1,
            'status' => 'active',
        ]);
    }
}
