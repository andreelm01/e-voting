<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\User;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class RtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->AdminAuthCheck();
        $i=1;
        $items = Rt::with(['Rw'])->get();
        return view('admin.rt.index_rt', compact('items','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AdminAuthCheck();
        $items = Rw::where('status', 1)->get();
        return view('admin.rt.create_rt', compact('items'));
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
        'unique' => 'No RT Sudah Ada di RW yang di pilih!',
        ];
        $request->validate([ 'no_rt' => 'required|min:1|max:20|unique:tbl_rt,id_rt',
                             'nama_rt' => 'required|min:1|max:30',
                             'no_rw' => 'required|min:1|max:20',
                             'keterangan' => 'required|min:1|max:225',
                             'id_rt' => 'required'
                         ],$messages);

        
        Rt::create($request->all());
        
        return redirect()->route('admin-rt.index')
                         ->with('success', 'Data RT Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rt  $rt
     * @return \Illuminate\Http\Response
     */
    public function show(Rt $rt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rt  $rt
     * @return \Illuminate\Http\Response
     */
    public function edit(Rt $admin_rt)
    {
        $this->AdminAuthCheck();
        $items = Rt::where('status', 1)->get();
        return view('admin.rt.edit_rt', compact('admin_rt','items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rt  $rt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rt $admin_rt)
    {
        $this->AdminAuthCheck();
        $request->validate([ 'no_rt' => 'required|min:1|max:20',
                             'nama_rt' => 'required|min:1|max:30',
                             'no_rw' => 'required|min:1|max:20',
                             'keterangan' => 'required|min:1|max:225'
                         ]);
                             // 'id_rt' => 'required|min:1|max:30|unique:tbl_rt,id_rt'

        $admin_rt->update($request->all());
        
        return redirect()->route('admin-rt.index')
                         ->with('success', 'Data Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rt  $rt
     * @return \Illuminate\Http\Response
     */
    public function destroy($admin_rt)
    {
        $this->AdminAuthCheck();
        $rt = Rt::findOrFail($admin_rt);
        $rt->delete();
        return redirect()->route('admin-rt.index')
                         ->with('success', 'Data Berhail Di Hapus!');
    }

    public function change_status(Request $request, $id)
    {
        //login admin check
        $this->AdminAuthCheck();
        Rt::where('id', $id)
            ->update(['status' => $request->value]);

    }

    public function list_rt($admin_rt)
    {
        $this->AdminAuthCheck();
        $rt = Rt::where('no_rt', $admin_rt)->first();
        $user = User::where('no_rt', $admin_rt)->get();
        $jumlah_user = User::where('no_rt', $admin_rt)->count();
        $i = 1;
        return view('admin.rt.list_rt', compact('admin_rt','rt','user','i','jumlah_user'));    
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
