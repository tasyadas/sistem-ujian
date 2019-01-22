<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Admin();
        $user->name = "Admin";
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('secret');
        $user->remember_token = str_random(10);
        $user->save();
    }
}
