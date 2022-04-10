<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    public function index()
    {
    	$user = User::count();
    	$admin = Admin::count();
    	$role = Role::count();
    	$permission = Permission::count();
    	
        return view('contents.dashboard', get_defined_vars());
    }
}
