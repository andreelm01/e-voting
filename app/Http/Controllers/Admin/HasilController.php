<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\Pemilihan;
use App\Models\User;
use App\Models\Calon;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use \PDF;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->AdminAuthCheck();
        $i = 1;
        $items = Pemilihan::with('calon')->orderBy('id', 'DESC')->get();
        return view('admin.hasil.index_hasil', compact('items','i'));
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
     * @param  \App\Models\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function show($admin_hasil)
    {
        $this->AdminAuthCheck();
        $dec = decrypt($admin_hasil);
        $hasil = Pemilihan::where('id_pemilihan', $dec)->first();
        
        $jumlahSuara = User::where('id_pemilihan', $dec)->count();

        $total = User::where('id_pemilihan', $dec)->count();
        $terpakai = Hasil::where('id_pemilihan', $dec)->count();

        $tidakTerpakai = $total - $terpakai;
        $pie = [
            'jumlahSuara' => User::where('id_pemilihan', $dec)->count(),
            'suaraTerpakai' => Hasil::where('id_pemilihan', $dec)->count(),
            'tidakTerpakai' => $tidakTerpakai
        ];

        $i = 1;
        $items = Calon::with(['hasil'])->where('id_pemilihan', $dec)->get();

        // $hasil = Hasil::where('id_pemilihan', $dec)->count();

        return view('admin.hasil.show_hasil', compact( 'hasil','pie','items','i'));
        // return $pie;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function edit(Hasil $hasil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hasil $hasil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hasil $hasil)
    {
        //
    }

    public function report_hasil($id)
    {
        $this->AdminAuthCheck();
        $dec = decrypt($id);
        // title
        $pemilihan = Pemilihan::where('id_pemilihan', $dec)->firstOrFail();
        $id = $pemilihan->id_pemilihan;
        $keterangan = $pemilihan->keterangan;

        // get jumlah suara total di tbl_user berdasarkan id_pemilihan
        $jumlahSuara = User::where('id_pemilihan', $dec)->count();
        // get jumlah suara yang terpakai di tbl_hasil berdasarkan id_pemilihan
        $SuaraTerpakai = Hasil::where('id_pemilihan', $dec)->count();
        // get suara tak terpakai jumlahSuara - SuaraTerpakai 
        $SuaraTidakTerpakai = $jumlahSuara - $SuaraTerpakai;


        // yang di forelse di view, menampilkan data dari tbl_hasil berdasarkan id_pemilihan
        $hasil = Hasil::with(['calon','user'])->where('id_pemilihan', $dec)->orderBy('id', 'DESC')->get();

        // get image
        $image = 'backend/img/vote.jpg';

        // get css
        $css = '<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">';
        
        // get date
        $date = date('d-m-Y');
        
        // get autoincrement number
        $i = 1;


        $pdf = PDF::loadView('admin.hasil.report_hasil',compact('pemilihan','image','css','date','jumlahSuara','hasil','i','SuaraTerpakai','SuaraTidakTerpakai','id','keterangan'));
        $customPaper = array( 0,0,800,1000 );
        $pdf->setPaper($customPaper);
        // $pdf->setPaper('a4', 'potrait');
        return $pdf->stream();

    }

    public function detail_hasil()
    {
        // $total_suara = 
        return view('admin.hasil.show_hasil');
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
