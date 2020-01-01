<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Faceades\Storage;
use App\userLogin;
use App\adminLogin;
use DB;

class machineController extends Controller
{

	public function create_user(Request $request) {

		$user_exists = userLogin::where('email', '=', $request->input('email'))->first();
		if ($user_exists === null) {
   			$user = new userLogin();
			$user-> fname = $request->input('fname');
			$user-> lname = $request->input('lname');
			$user-> address = $request->input('address');
			$user-> phone = $request->input('phone');
			$user-> email = $request->input('email');
			$user-> password = $request->input('password');
			$user-> status = '1';
			$user->save();

			if ($user -> id > 0) {
				$response = [
					"status" => 1,
					"msg" => "new user created"
				];
				return response()->json($response);
			} else {
				$response = [
					"status" => 0,
					"msg" => "failed to create new user"
				];
				return response()->json($response);
			}

		} else {
			$response = [
				"status" => 0,
				"msg" => "Account already exists"
			];
			return response()->json($response);
		}
		
	}

	public function user_login(Request $request) {

		 $user = userLogin::where('email', $request->input('email'))->first();

		 if ($user === null) {
		 	$res = [
		 		"status" => 0,
		 		"msg" => 'No user exists'
		 	];
		 	return response($res);
		 } else {
		 	if ($user -> password == $request->input('password')) {
		 		$res = [
		 			"status" => 1,
		 			"userId" => $user -> id,
		 		];
		 		return response($res);
		 	} else {
		 		$res = [
		 			"status" => 0,
		 			"msg" => 'incorrect password'
		 		];
		 		return response($res);
		 	}
		 }
	}

	public function create_admin(Request $request){
		$admin_exists = adminLogin::where('username', '=', $request->input('username'))->first();
			if ($admin_exists === null) {
   			$admin = new adminLogin();
			$admin-> username = $request->input('username');
			$admin-> password = $request->input('password');
			$admin->save();

			if ($admin -> id > 0) {
				$response = [
					"status" => 1,
					"msg" => "new admin created"
				];
				return response()->json($response);
			} else {
				$response = [
					"status" => 0,
					"msg" => "failed to create new admin"
				];
				return response()->json($response);
			}

		} else {
			$response = [
				"status" => 0,
				"msg" => "Account already exists"
			];
			return response()->json($response);
		}
	}

	public function admin_login(Request $request) {
		$admin = adminLogin::where('username', $request->input('username'))->first();

		 if ($admin === null) {
		 	$res = [
		 		"status" => 0,
		 		"msg" => 'No admin exists'
		 	];
		 	return response($res);
		 } else {
		 	if ($admin -> password == $request->input('password')) {
		 		$res = [
		 			"status" => 1,
		 			"adminId" => $admin -> id,
		 		];
		 		return response($res);
		 	} else {
		 		$res = [
		 			"status" => 0,
		 			"msg" => 'incorrect password'
		 		];
		 		return response($res);
		 	}
		 }
	}

}
