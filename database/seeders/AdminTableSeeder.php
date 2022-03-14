<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::where('id',1)->doesntexist()) {
             User::create([
                 'name' => 'Administrator',
                 'email' => 'admin@murganbhakthi.com',
                 'password' => bcrypt('12345678'),
             ]);
        }
    }
}
