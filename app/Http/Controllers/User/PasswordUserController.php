<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use Hash;

class PasswordUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $this->UserAuthCheck();
        $dec = decrypt($user);
        $user = User::findOrFail($dec);        
        return view('user.edit_password',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        $this->UserAuthCheck();
        $request->validate([ 'password' => 'required|max:30' ]);

        $dec = decrypt($user);
        $pass = Hash::make($request->password);
        
        $data['password'] = $pass;
        $item = User::findOrFail($dec);
        $item->update($data);

        return redirect()->route('user')
                         ->with('success', 'Password Anda Berhasil di Update!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function UserAuthCheck()
    {
        $user_id=Session::get('id_user');
        if ($user_id) {
            return;
        }else{
            Session::put('notif', 'Login Please!!');
            return Redirect::to('/user-login')->send();
        }
    }
}
