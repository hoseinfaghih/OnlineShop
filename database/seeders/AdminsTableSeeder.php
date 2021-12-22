<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin;
        $admin->name = "Steve";
        $admin->email = "hfaghih80@gmail.com";
        $admin->password = Hash::make("11aa22bb");
        $admin->save();
        $admin = new Admin;
        $admin->name = "Kambiz";
        $admin->email = "hfaghih94@gmail.com";
        $admin->password = Hash::make("33cc44dd");
        $admin->save();
    }
}
