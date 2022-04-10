<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

use Alert;

class PermissionController extends Controller
{
    protected $permissionService;

	public function __construct()
	{
		$this->permissionService = '';
	}

	public function index(Request $request)
    {
        $data = Permission::all();

    	return view('contents.permissions.index', get_defined_vars());
    }

    public function create()
    {
    	return view('contents.permissions.create', get_defined_vars())->renderSections()['content'];
    }

    public function edit($id)
    {
        $data = Permission::find($id);

    	return view('contents.permissions.edit', get_defined_vars())->renderSections()['content'];
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
            $data = Permission::create([
                'name' => $request->name,
                'guard_name' => $request->guard_name
            ]);

            Alert::success('Success', 'Create permission successfully');
        } catch (Exception $ex) {
            Alert::error('Error', $ex->getMessage());           
        }

    	return redirect()->route('manage-permissions');
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

    	try {
            $data = Permission::find($id)->update([
                'name' => $request->name,
                'guard_name' => $request->guard_name
            ]);

            Alert::success('Success', 'Update permission successfully');
        } catch (Exception $ex) {
            Alert::error('Error', $ex->getMessage());           
        }

    	return redirect()->route('manage-permissions');
    }

    public function destroy($id)
    {
    	try {
            $data = Permission::find($id)->delete();

            Alert::success('Success', 'Delete permission successfully');
        } catch (Exception $ex) {
            Alert::error('Error', $ex->getMessage());           
        }

    	return redirect()->back();
    }
}
