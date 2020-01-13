<?php

namespace App\Http\Controllers;

use App\UserDetails;
use App\UserLogin;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function fn_create_user(Request $req)
    {
        $user = UserLogin::firstOrNew(['email' => $req->input('email')]);
        if ($user->id > 0) {
            return response(['status' => false, 'msg' => 'user already exits']);
        } else {
            if ($req->input('role') == 'admin') {
                $auth = UserLogin::find($req->input('userId'));
                if (is_null($auth)) {
                    return response(['status' => false, 'msg' => 'Permission denied']);
                } else {
                    $user->password = $req->input('password');
                    $user->role = $req->input('role');
                    $user->save();
                    return response(['status' => true, 'msg' => 'New admin created']);
                }
                return response($auth);
            } else {
                $user->password = $req->input('password');
                $user->role = $req->input('role');
                $user->save();
                $user_details = new UserDetails();
                $user_details->fname = $req->input('fname');
                $user_details->lname = $req->input('lname');
                $user_details->address = $req->input('address');
                $user_details->phone = $req->input('phone');
                $user_details->fk_login_id = $user->id;
                $user_details->save();
                return response(['status' => True, 'msg' => 'New user created']);
            }
        }
    }

    public function fn_user_login(Request $req)
    {
        $user = UserLogin::where('email', $req->input('email'))->first();
        if (!is_null($user)) {
            if ($user->password == $req->input('password')) {
                $res = [
                    'status' => true,
                    'userId' => $user->id,
                    'role' => $user->role
                ];
                return response($res);
            } else {
                return response(['status' => false, 'msg' => 'invalid password']);
            }
        } else {
            return response(['status' => false , 'msg' => 'Invalid username']);
        }
    }

}
