<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Rw;
use App\Models\Rt;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use Hash;
use Illuminate\Support\Str;
use PDF;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {
        $this->AdminAuthCheck();
        $i = 1 ;
        $items = User::with(['rt','rw'])->orderBy('id','DESC')->get();
        return view('admin.user.index_user', compact('items','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AdminAuthCheck();
        $rw = Rw::where('status', 1)->pluck('no_rw','no_rw');
        $rt = Rt::all()->where('status', 1);
        $r = 'WRG' .'-'.Str::random(3);

        return view('admin.user.create_user',compact('rt','rw','r'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->AdminAuthCheck();
        $messages = [
                    'unique' => 'id user / username yang di pilih sudah ada!',
                    'not_in' => 'No. RT / No. RT kosong!',
                    ];

        $request->validate([ 'id_user' => 'required|min:1|max:20|unique:tbl_user,id_user',
                             'nama' => 'required|min:2|max:30',
                             'alamat' => 'required|min:1',
                             'no_rumah' => 'required|min:2|max:30',
                             'no_rw' => 'required|min:1|max:20|not_in:0',
                             'no_rt' => 'required|min:1|max:20|not_in:0',
                             'username' => 'required|unique:tbl_user,username|min:1|max:30',
                             'password' => 'required|min:2|max:30',
                             'id_pemilihan' => 'required|min:1|max:20',
                         ],$messages);
        // return $request->all();
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        User::create($data);

        return redirect()->route('admin-user.index')
                         ->with('success', 'Data Berhasil Dibuat!');
        // return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($admin_user)
    {
        $this->AdminAuthCheck();
        $admin_user = User::findOrFail($admin_user);
        return view('admin.user.show_user', compact( 'admin_user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin_user)
    {
        $this->AdminAuthCheck();
        $rw = Rw::where('status', 1)->pluck('no_rw','no_rw');
        $rt = Rt::all()->where('status', 1);

        return view('admin.user.edit_user',compact('admin_user','rt','rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin_user)
    {
        $this->AdminAuthCheck();
        $request->validate([ 'id_user' => 'required|min:1|max:20',
                             'nama' => 'required|min:2|max:30',
                             'alamat' => 'required|min:1',
                             'no_rumah' => 'required|min:2|max:30',
                             'no_rw' => 'max:20',
                             'no_rt' => 'max:20',
                             'username' => 'required',
                             'password' => 'max:30',
                             'id_pemilihan' => 'required',
                         ]);
                             // 'id_rt' => 'required|min:1|max:30|unique:tbl_rt,id_rt'

        // $admin_user->update($request->all());
        // return $request->all();
        $pass =Hash::make($request->password);
        $old = $request->token;
        $old_rw = $request->token_rw;
        $old_rt = $request->token_rt;

        if ($request->password == '' && $request->no_rw == '' && $request->no_rt == '' ) {
            $admin_user->update(['id_user' => $request->id_user,
                            'nama' => $request->nama,
                            'alamat' => $request->alamat,
                            'no_rumah' => $request->no_rumah,
                            'no_rw' => $old_rw,
                            'no_rt' => $old_rt,
                            'username' => $request->username,
                            'password' => $old,
                            'id_pemilihan' => $request->id_pemilihan,
                        ]);
        }
        else if ($request->password == '' && $request->no_rw !== '' && $request->no_rt !== '' ) {
            $admin_user->update(['id_user' => $request->id_user,
                            'nama' => $request->nama,
                            'alamat' => $request->alamat,
                            'no_rumah' => $request->no_rumah,
                            'no_rw' => $request->no_rw,
                            'no_rt' => $request->no_rt,
                            'username' => $request->username,
                            'password' => $old,
                            'id_pemilihan' => $request->id_pemilihan,
                        ]);
        }
        else if ($request->password !== '' && $request->no_rw == '' && $request->no_rt == '' ) {
            $admin_user->update(['id_user' => $request->id_user,
                            'nama' => $request->nama,
                            'alamat' => $request->alamat,
                            'no_rumah' => $request->no_rumah,
                            'no_rw' => $old_rw,
                            'no_rt' => $old_rt,
                            'username' => $request->username,
                            'password' => $pass,
                            'id_pemilihan' => $request->id_pemilihan_old,
                        ]);
        }
        else if ($request->password !== '' && $request->no_rw !== '' && $request->no_rt !== '' ) {
            $admin_user->update(['id_user' => $request->id_user,
                            'nama' => $request->nama,
                            'alamat' => $request->alamat,
                            'no_rumah' => $request->no_rumah,
                            'no_rw' => $request->no_rw,
                            'no_rt' => $request->no_rt,
                            'username' => $request->username,
                            'password' => $pass,
                            'id_pemilihan' => $request->id_pemilihan,
                        ]);
        }
        
        
        return redirect()->route('admin-user.index')
                         ->with('success', 'Data Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($admin_user)
    {
        $this->AdminAuthCheck();
        $user = User::findOrFail($admin_user);
        $user->delete();
        return redirect()->route('admin-user.index')
                         ->with('success', 'Data Berhail Di Hapus!');
    }

    public function change_status(Request $request, $id)
    {
        //login admin check
        $this->AdminAuthCheck();
        User::where('id', $id)
            ->update(['status' => $request->value]);

    }

    public function getRT($id) 
    {
        $this->AdminAuthCheck();
        $rt = Rt::where('no_rw',$id)->where('status', 1)->pluck('no_rt','no_rt');
        return json_encode($rt);
    }

    public function user_report($id)
    {
        // $this->AdminAuthCheck();
        $dec = decrypt($id);
        // title
        $id_user = User::where('id', $dec)->firstOrFail();
        
        // get image
        $image = 'backend/img/vote.jpg';

        // get date
        $date = date('d-m-Y');

        $pdf = PDF::loadView('admin.user.report_user',compact('id_user','date','image'));
        // $customPaper = array( 0,0,800,1000 );
        // $pdf->setPaper($customPaper);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();

    }

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
