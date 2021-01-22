<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hardiks = User::where('first_name', 'Hardiks')->first();
        Company::create([
            'title' => 'Hardiks cOmp',
            'description' => 'its hardiks company',
            'phone' => '123456789',
            'user_id' => $hardiks->id,
        ]);

        $alesk = User::where('first_name', 'alesk')->first();
        Company::create([
            'title' => 'alesk cOmp',
            'description' => 'its alesk company',
            'phone' => '123456789',
            'user_id' => $alesk->id,
        ]);
    }
}
