<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Rw;
use App\Models\Rt;
use App\Models\User;
use App\Models\Pemilihan;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cache;
use Hash;
use DB;

class AdminController extends Controller
{
    // login function start / view login admin
    public function admin_login()
    {
        return view('admin.admin_login');
    }
    //  function login admin 
    public function admin_login_check(Request $request)
    {   
        
        $this->validate($request,[
        'admin_email' => 'required|email|min:6|max:50',
        'admin_password' => 'required|min:5|max:50'
        ]);

        $data = Admin::where('admin_email' , $request->admin_email)->first();
        if($data){ 
            if(Hash::check($request->admin_password, $data->admin_password)){
                Session::put('id_admin',$data->id_admin);
                Session::put('admin_name',$data->admin_name);
                return Redirect::to('/administrator');
            }else{
                return Redirect::to('/administrator-login')->with(['notif' => 'Email Or Password Invalid!'])->send();
            }
        }else{
                return Redirect::to('/administrator-login')->with(['notif' => 'Email Or Password Invalid!'])->send();
            }
    }
    //  function logout admin 
    public function admin_logout()
    {
        Session::flush();
        Cache::flush();
        Session::regenerate();
        return Redirect::to('/administrator-login');
    }
    
    // login function end

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->AdminAuthCheck();
        $rw = Rw::all()->count();
        $rt = Rt::all()->count();
        $user = User::all()->count();
        $pemilihan = Pemilihan::all()->count();
        return view('admin.dashboard', compact('rw','rt','user','pemilihan'));
    }

    //  function admin auth checks 
    public function AdminAuthCheck()
    {
        $admin_id=Session::get('id_admin');
        if ($admin_id) {
            return;
        }else{
            Session::put('notif', 'Login Please!!');
            return Redirect::to('/administrator-login')->send();
        }
    }
}
