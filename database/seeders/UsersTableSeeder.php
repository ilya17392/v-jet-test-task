<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'alesk',
            'last_name' => 'josn',
            'phone' => '123456789',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('123456'),
        ]);
        User::create([
            'first_name' => 'Hardiks',
            'last_name' => 'steh',
            'phone' => '123456789',
            'email' => 'user72@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
