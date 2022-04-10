<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = Role::create(['name' => 'super-admin', 'guard_name' => 'admin']);

        $branchAdmin = Role::create(['name' => 'branch-admin', 'guard_name' => 'admin']);

        $user = Role::create(['name' => 'user', 'guard_name' => 'web']);
        $user->givePermissionTo('edit profile');
        $user->givePermissionTo('show profile');
    }
}
