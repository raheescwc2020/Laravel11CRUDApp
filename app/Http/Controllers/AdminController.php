<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

     $adminRole = DB::table('roles')->where('name', 'admin')->first();

        $users = User::where('role_id',$adminRole->id)->paginate(10);

        return view('admins.index',compact('users'));
    }
}
