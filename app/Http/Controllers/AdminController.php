<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
        if(!Auth::user()->isAdmin) {
            abort(403, 'You are not in admin list.');
        }
    }

    public function index()
    {
        $new_users = DB::table('users')
            ->where('verified', '=', false)
            ->get();
        return view('admin', compact('new_users'));
    }

    public function verify_user()
    {
        $target_id = (int)Input::get('id');
        $target_user = User::findOrFail($target_id);
        $target_user->verified = true;
        $target_user->save();
        return response()->json(array('success'=>true, 'message'=>'success!'), 200);
    }

    public function delete_user()
    {
        $target_id = (int)Input::get('id');
        $target_user = User::findOrFail($target_id);
        $target_user->delete();
        return response()->json(array('success'=>true, 'message'=>'success!'), 200);
    }
}
