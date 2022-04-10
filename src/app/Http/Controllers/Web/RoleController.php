<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\RolePermission;

use Alert;
use DB;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct()
    {
        $this->roleService = '';
    }

    public function index(Request $request)
    {
        $data = Role::all();

        return view('contents.roles.index', get_defined_vars());
    }

    public function create()
    {
        // $permissions = Permission::where('guard_name', $data->guard_name)->get();
        
        return view('contents.roles.create', get_defined_vars())->renderSections()['content'];
    }

    public function edit($id)
    {
        $data = Role::find($id);
        $myPermission = RolePermission::select('permission_id')->where('role_id', $id)->pluck('permission_id')->toArray();
        $permissions = Permission::where('guard_name', $data->guard_name)->get();

        return view('contents.roles.edit', get_defined_vars())->renderSections()['content'];
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'guard_name' => ['required'],
        ]);

        if ($validator->fails()) {
            Alert::error('Error', $validator->errors()->first());

            return redirect()->back();
        }

        try {
            $data = Role::create([
                'name' => $request->name,
                'guard_name' => $request->guard_name
            ]);

            Alert::success('Success', 'Update role '.$data->name.' successfully');
        } catch (Exception $ex) {
            Alert::error('Error', $ex->getMessage());           
        }

        return redirect()->route('manage-roles');
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'guard_name' => ['required'],
        ]);

        if ($validator->fails()) {
            Alert::error('Error', $validator->errors()->first());

            return redirect()->back();
        }

        DB::beginTransaction();

        try {
            $data = Role::find($id);
            $data->update([
                'name' => $request->name,
                'guard_name' => $request->guard_name
            ]);

            $data->syncPermissions($request->permissions);

            DB::commit();
            Alert::success('Success', 'Update role '.$data->name.' successfully');
        } catch (Exception $ex) {
            DB::rollBack();
            Alert::error('Error', $ex->getMessage());           
        }

        return redirect()->route('manage-roles');
    }

    public function destroy($id)
    {
        try {
            $data = Role::find($id)->delete();

            Alert::success('Success', 'Delete role successfully');
        } catch (Exception $ex) {
            Alert::error('Error', $ex->getMessage());           
        }

        return redirect()->back();
    }
}
