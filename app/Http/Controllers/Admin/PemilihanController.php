<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rw;
use App\Models\Rt;
use App\Models\Pemilihan;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class PemilihanController extends Controller
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
        $items = Pemilihan::orderBy('id','DESC')->get();
        return view('admin.pemilihan.index_pemilihan', compact('items','i'));
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
        // $r = 'Vot' .'-'.Str::random(3);
        return view('admin.pemilihan.create_pemilihan',compact('rt','rw'));
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
        'unique' => 'id pemilihan yang di pilih sudah ada!',
        ];
        $request->validate([ 'id_pemilihan' => 'required|unique:tbl_pemilihan,id_pemilihan',
                             'no_rw' => 'required|min:1|max:20',
                             'no_rt' => 'required|min:1|max:20',
                             'keterangan' => 'required|min:1|max:225'
                         ],$messages);

        Pemilihan::create($request->all());
        
        return redirect()->route('admin-pemilihan.index')
                         ->with('success', 'Data Pemilihan Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemilihan  $pemilihan
     * @return \Illuminate\Http\Response
     */
    public function show($admin_pemilihan)
    {
        $this->AdminAuthCheck();
        $admin_pemilihan = Pemilihan::findOrFail($admin_pemilihan);
        return view('admin.pemilihan.show_pemilihan', compact( 'admin_pemilihan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemilihan  $pemilihan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemilihan $admin_pemilihan)
    {
        $this->AdminAuthCheck();
        $rw = Rw::where('status', 1)->pluck('no_rw','no_rw');
        $rt = Rt::all()->where('status', 1);

        return view('admin.pemilihan.edit_pemilihan',compact('admin_pemilihan','rt','rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemilihan  $pemilihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemilihan $admin_pemilihan)
    {
        $this->AdminAuthCheck();
        $request->validate([ 'id_pemilihan' => 'required|min:1|max:30',
                             'no_rw' => 'max:20',
                             'no_rt' => 'max:20',
                             'keterangan' => 'required|min:1|max:225'
                         ]);

        $old_rw = $request->token_rw;
        $old_rt = $request->token_rt;

        if ($request->no_rw == '' && $request->no_rt == '' ) {
            $admin_pemilihan->update(['id_pemilihan' => $request->id_pemilihan,
                            'keterangan' => $request->keterangan,
                            'no_rw' => $old_rw,
                            'no_rt' => $old_rt
                        ]);
        }
        else if ($request->no_rw !== '' && $request->no_rt !== '' ) {
            $admin_pemilihan->update(['id_pemilihan' => $request->id_pemilihan,
                            'keterangan' => $request->keterangan,
                            'no_rw' => $request->no_rw,
                            'no_rt' => $request->no_rt
                        ]);
        }

        // $admin_pemilihan->update($request->all());
        
        return redirect()->route('admin-pemilihan.index')
                         ->with('success', 'Data Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemilihan  $pemilihan
     * @return \Illuminate\Http\Response
     */
    public function destroy($admin_pemilihan)
    {
        $this->AdminAuthCheck();
        $pemilihan = Pemilihan::findOrFail($admin_pemilihan);
        $pemilihan->delete();
        return redirect()->route('admin-pemilihan.index')
                         ->with('success', 'Data Berhail Di Hapus!');
    }

    public function change_status(Request $request, $id)
    {
        //login admin check
        $this->AdminAuthCheck();
        Pemilihan::where('id', $id)
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
