<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemilihan;
use App\Models\Calon;
use Illuminate\Http\Request;
use Session;
use File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class CalonController extends Controller
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
        $items = Calon::with(['pemilihan'])->orderBy('id','DESC')->get();
        return view('admin.calon.index_calon', compact('items','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AdminAuthCheck();
        $items = Pemilihan::where('status', 1)->get();
        return view('admin.calon.create_calon', compact('items'));
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
        'unique' => 'ID Calon Sudah Ada di Pemilihan yang di pilih!',
        ];
        $this->validate($request,[  'id_pemilihan' => 'required|min:1|max:20|not_in:0',
                                    'id_calon' => 'required|min:1|max:20|unique:tbl_calon,id_calon',
                                    'nama' => 'required|min:1|max:30',
                                    'image' => 'required|file|nullable|mimes:png,jpeg,jpg|max:2000',
                                    'keterangan' => 'required|min:1|max:225',
                                ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('image');
 
        $image = $file->getClientOriginalName();
 
                // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/fotocalon/';
        $file->move($tujuan_upload,$image);
 
        Calon::create([
            'id_pemilihan' => $request->id_pemilihan,
            'id_calon' => $request->id_calon,
            'nama' => $request->nama,
            'image' => $image,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('admin-calon.index')
                         ->with('success', 'Data Berhasil Dibuat!');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function show(Calon $calon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function edit(Calon $admin_calon)
    {
        $this->AdminAuthCheck();
        $items = Pemilihan::where('status', 1)->get();
        return view('admin.calon.edit_calon', compact('admin_calon','items'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $admin_calon)
    {
        $this->AdminAuthCheck();
        $this->validate($request,[  'id_pemilihan' => 'required|min:1|max:20|not_in:0',
                                    'id_calon' => 'required|min:1|max:20',
                                    'nama' => 'required|min:1|max:30',
                                    'image' => 'file|nullable|mimes:png,jpeg,jpg|max:2000',
                                    'keterangan' => 'required|min:1|max:225',
                                    'gambar_old' => 'required|min:3'
                                ]);
        $data= array();
        $data['id_calon']=$request->id_calon;
        $data['id_pemilihan'] = $request->id_pemilihan;
        $data['nama']=$request->nama;
        $data['keterangan']=$request->keterangan;
        $data['updated_at'] =new \DateTime();
        $old = $request->gambar_old;
        $image=$request->file('image');
            //jika gambar tidak di rubah
        if($request->file('image') == ""){
            $data['image']=$old;

        Calon::where('id',$admin_calon)
              ->update($data);
        
        return redirect()->route('admin-calon.index')
                              ->with('success', 'Data Berhasil Dirubah Tanpa Merubah Gambar');
        }
        else if ($image) {
            //jika gambar  di rubah , maka unlink gambar yang lam
            $nama_file = $image->getClientOriginalName();
            $tujuan_upload = 'assets/fotocalon/';
            $success=$image->move($tujuan_upload,$nama_file);

            if ($success) {
            $data['image']=$nama_file;
            //unlink($old);
            $gambar = Calon::where('id', $admin_calon)->first();
            File::delete('assets/fotocalon/'.$gambar->image);
            Calon::where('id', $admin_calon)
              ->update($data);

            return redirect()->route('admin-calon.index')
                         ->with('success', 'Data Berhasil Dirubah Dengan Gambar');
            }
        }
        
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function destroy($admin_calon)
    {
        $this->AdminAuthCheck();
        $gambar = Calon::where('id',$admin_calon)->first();
        // hapus data
        File::delete('assets/fotocalon/'.$gambar->image);
        Calon::where('id',$admin_calon)->delete();
        return redirect()->route('admin-calon.index')
                         ->with('success', 'Data Berhasil Dihapus');
    }

    public function change_status(Request $request, $id)
    {
        //login admin check
        $this->AdminAuthCheck();
        Calon::where('id', $id)
            ->update(['status' => $request->value]);

    }

    public function list_calon($admin_calon)
    {
        $this->AdminAuthCheck();
        $pemilihan = Pemilihan::where('id_pemilihan', $admin_calon)->first();
        $calon = Calon::where('id_pemilihan', $admin_calon)->get();
        $jumlahCalon = Calon::where('id_pemilihan', $admin_calon)->count();
        $i = 1;
        return view('admin.calon.list_calon', compact('admin_calon','pemilihan','calon','i','jumlahCalon'));    
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
