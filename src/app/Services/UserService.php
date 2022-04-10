<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;
use App\Models\User;

use Alert;
use Exception;
use InvalidArgumentException;

class UserService
{
	public function getAllUsers()
	{
		return User::all();
	}

	public function getAllBranchAdmins()
	{
		return Admin::all();
	}

	public function getAllSuperAdmins()
	{
		return Admin::all();
	}

	public function getAll()
	{
		$user = User::all();
		$admin = Admin::all();

		$result = $user->merge($admin);

		return $result;
	}

	public function getUserBydId($id)
	{
		return User::find($id);
	}

	public function saveUserData($data)
	{		
       $returnValue = null;
       $message = null;

       DB::beginTransaction();

        try {
            $user = new User;
            $user->name = $data->name;
            $user->username = $this->generateUsername($data->name);
            $user->email = $data->email;
            $user->password = Hash::make($data->password);

            $user->save();            
	        $user->assignRole('user');

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return $returnValue;
	}

	public function updateUserData($data, $id)
	{
		$returnValue = null;
    	$message = null;

    	DB::beginTransaction();

        try {
            $user = User::find($id);
            $user->name = $data->name;
            $user->username = $this->generateUsername($data->name);
            $user->email = $data->email;
            $user->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return $returnValue;
	}

	public function updateUserPassword($data, $id)
	{
		$returnValue = null;
    	$message = null;

    	DB::beginTransaction();

        try {
            $user = User::find($id);
            $user->password = Hash::make($data->password);
            $user->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return $returnValue;
	}

	public function deleteUserById($id)
	{
		return User::find($id)->delete();
	}

	protected static function generateUsername($name)
    {
        $temp = explode(' ', $name);
        $username = $name[0] . $temp[count($temp) - 1];

        $username = strtolower($username);
        $username = preg_replace('/[^A-Za-z0-9\.]/', '', $username);

        $checkUsername = User::where('username', $username)->first();

        if ($checkUsername) {
            $username_with_inc = '';
            $increment = 0;

            while ($checkUsername) {
                $increment++;
                $username_with_inc = $username . str_pad($increment, 2, "0", STR_PAD_LEFT);
                $checkUsername = User::where('username', $username_with_inc)->first();
            }
            
            $username = $username_with_inc;
        }

        return $username;
    }
}