<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

use App\Services\UserService;

use Alert;

class UserController extends Controller
{
	protected $userService;

	public function __construct(UserService $userService)
	{
		$this->userService = $userService;

        $this->middleware('permission:show profile', ['only' => ['profile']]);
        $this->middleware('permission:edit profile', ['only' => ['editProfile', 'updateProfile']]);
	}

    public function index(Request $request)
    {
        $data = $this->userService->getAllUsers();

    	return view('contents.users.index', get_defined_vars());
    }

    public function admin(Request $request)
    {
        $data = $this->userService->getAllBranchAdmins();

        return view('contents.users.index', get_defined_vars());
    }

    public function show($id)
    {
        return view('contents.users.show', get_defined_vars())->renderSections()['content'];
    }

    public function create()
    {    	
    	return view('contents.users.create', get_defined_vars())->renderSections()['content'];
    }

    public function edit($id)
    {
        $data = $this->userService->getUserBydId($id);

        if (!$data) {
            abort(404);
        }

    	return view('contents.users.edit', get_defined_vars())->renderSections()['content'];
    }

    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), [
			'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
		]);

		if ($validator->fails()) {
        	Alert::error('Error', $validator->errors()->first());

			return redirect()->back();
        }

    	try {
    		$data = $this->userService->saveUserData($request);

            Alert::success('Success', 'Add user successfully');
    	} catch (Exception $ex) {
            Alert::error('Error', $ex->getMessage());    		
    	}

    	return redirect()->route('manage-users');
    }

    public function update(Request $request, $id)
    {
    	$validator = Validator::make($request->all(), [
			'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
		]);

		if ($validator->fails()) {
        	Alert::error('Error', $validator->errors()->first());

			return redirect()->back();
        }

    	try {
            $data = $this->userService->updateUserData($request, $id);

            Alert::success('Success', 'Update user successfully');
        } catch (Exception $ex) {
            Alert::error('Error', $ex->getMessage());           
        }

    	return redirect()->route('manage-users');
    }

    public function destroy($id)
    {
    	try {
            $data = $this->userService->deleteUserById($id);

            Alert::success('Success', 'Delete user successfully');
        } catch (Exception $ex) {
            Alert::error('Error', $ex->getMessage());           
        }

    	return redirect()->route('manage-users');
    }

    public function profile()
    {
        return view('contents.users.profile.index', get_defined_vars());
    }

    public function editProfile()
    {
        return view('contents.users.profile.edit', get_defined_vars())->renderSections()['content'];
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        if ($validator->fails()) {
            Alert::error('Error', $validator->errors()->first());

            return redirect()->back();
        }

        try {
            
        } catch (Exception $ex) {
            
        }

        return redirect()->route('profile');
    }
}
