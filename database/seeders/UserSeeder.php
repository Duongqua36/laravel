<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = new User();
        $users->name = 'ChuDuong';
        $users->email = 'chuduong0306@gmail.com';
        $users->password= Hash::make('1234567');
        $users->save();
    }
}
