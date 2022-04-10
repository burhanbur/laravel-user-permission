<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\Admin;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'name' => 'Bayu Wicaksono',
            'username' => 'bwicaksono',
            'email' => 'bayu@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        $admin->assignRole('super-admin');

        $user = User::create([
            'name' => 'Burhan Mafazi',
            'username' => 'bmafazi',
            'email' => 'burhan@gmail.com',
            'password' => Hash::make('user123'),
        ]);

        $user->assignRole('user');
    }
}
