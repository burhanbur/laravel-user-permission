<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

    	$table = 'permissions';

        $data = [
            [
                'name' => 'get all users',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'get user',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'add user',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'edit user',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'delete user',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'show profile',
                'guard_name' => 'web'
            ],
            [
                'name' => 'edit profile',
                'guard_name' => 'web'
            ],
        ];

        DB::table($table)->insert($data);
    }
}
