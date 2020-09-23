<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rw;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;

class RwController extends Controller
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
        $items = Rw::all();
        return view('admin.rw.index_rw', compact('items','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AdminAuthCheck();
        return view('admin.rw.create_rw');
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
        'unique' => 'No RW Sudah Ada!',
        ];
        $request->validate([ 'no_rw' => 'required|min:1|max:20|unique:tbl_rw,no_rw',
                             'nama_rw' => 'required|min:1|max:30',
                             'keterangan' => 'required|min:1|max:225',
                         ],$messages);

        Rw::create($request->all());
        
        return redirect()->route('admin-rw.index')
                         ->with('success', 'Data RW Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function show(Rw $rw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function edit(Rw $admin_rw)
    {
        $this->AdminAuthCheck();
        return view('admin.rw.edit_rw', compact('admin_rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rw $admin_rw)
    {
        $this->AdminAuthCheck();
        $request->validate([ 'no_rw' => 'required|min:1|max:20',
                             'nama_rw' => 'required|min:1|max:30',
                             'keterangan' => 'required|min:1|max:225',
                         ]);

        $admin_rw->update($request->all());
        
        return redirect()->route('admin-rw.index')
                         ->with('success', 'Data Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function destroy($admin_rw)
    {
        $this->AdminAuthCheck();
        $rw = Rw::findOrFail($admin_rw);
        $rw->delete();
        return redirect()->route('admin-rw.index')
                         ->with('success', 'Data Berhail Di Hapus!');
    }

    public function change_status(Request $request, $id)
    {
        //login admin check
        $this->AdminAuthCheck();
        Rw::where('id', $id)
            ->update(['status' => $request->value]);

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
