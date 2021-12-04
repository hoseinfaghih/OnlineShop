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
        foreach(range(1,20) as $item){
            $user = new User;
            $user->name = "name $item famil $item";
            $user->email = "email$item@gmail.com";
            $user->password = Hash::make ("$item$item$item$item$item$item"); //6ta az hamoon adad
            $user->save();
        }
    }
}
