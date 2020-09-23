<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pemilihan;
use App\Models\Calon;
use App\Models\Hasil;
use App\Models\Log;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cache;
use Hash;

class UserLoginController extends Controller
{
        public function user_login()
    {
        return view('user.user_login');
    }
    //  function login admin 
    public function user_login_check(Request $request)
    {   
        
        $this->validate($request,[
        'username' => 'required|min:3|max:50',
        'password' => 'required|min:5|max:50'
        ]);

        $data = User::where('username' , $request->username)->where('status' , 1)->first();
        if($data){ 
            if(Hash::check($request->password, $data->password)){
                Session::put('id',$data->id);
                Session::put('id_user',$data->id_user);
                Session::put('nama',$data->nama);
                Session::put('id_pemilihan',$data->id_pemilihan);

                $save = array();
                $save['id_user'] = $data->id_user;
                $save['time_in'] = new \DateTime();
                Log::create($save);

                // return Redirect::to('/user');
                return redirect()->route('user')
                         ->with('update', 'Update Password anda jika pertama kali login!');
            }else{
                return Redirect::to('/user-login')->with(['notif' => 'Email Or Password Invalid!'])->send();
            }
        }else{
                return Redirect::to('/user-login')->with(['notif' => 'Email Or Password Invalid!'])->send();
            }
    }
    //  function logout admin 
    public function user_logout()
    {
        $id_user = Session::get('id_user');
        $update= array();
        $update['id_user'] = $id_user;
        $update['time_out'] = new \DateTime();

        Log::where('id_user', $id_user)->latest()->first()
              ->update($update);
        

        Session::flush();
        Cache::flush();
        Session::regenerate();
        return Redirect::to('/user-login');
    }


    public function dashboard()
    {
        $this->UserAuthCheck();
        return view('user.dashboard');
    }

    public function profile(Request $request, $id_user)
    {
        $this->UserAuthCheck();
        $dec = decrypt($id_user);
        $user = User::where('id_user',$dec)->first();
        return view('user.profile',compact('user'));

    }

    public function user_pemilihan(Request $request, $id_pemilihan)
    {
        $this->UserAuthCheck();
        $pemilihan = Session::get('id_pemilihan');
        $cek_pemilihan = Pemilihan::where('id_pemilihan', $pemilihan)->get()->first();
        // return $cek_pemilihan;

        if (is_null($cek_pemilihan)) {
            return redirect()->route('user')->with('kosong', 'Belum Ada Pemilihan!');
        }

        $id_user = Session::get('id_user');
        $dec = decrypt($id_pemilihan);

        // get data pemilihan sesuai dengan rt rw user / id_pemilihan
        $pemilihan = Pemilihan::where('id_pemilihan', $dec)->first();

        // get daftar calon berdasarkan id_pemilihan
        $calon = Calon::where('id_pemilihan', $dec)->where('status', 1)->get();
        // $count_calon = Calon::where('id_pemilihan', $dec)->where('status', 1)->count();
        // return $count_calon;

        // check hasil, jika belum memilih tombol akan enable, jika sudah akan ada keterangan dan tombol diosabled
        $cek_hasil = Hasil::where('id_user', $id_user)->get()->first();

        if (is_null($cek_hasil)) {
            $info = ['status' => 'Pemilihan yang tersedia',
                     'btn_submit' => '',
                     'style' => '',
            ];
        } else {
            $info = ['status' => 'Anda Sudah Menggunakan Hak Pilih!',
                     'btn_submit' => 'javascript:void(0)',
                     'style' => 'opacity: .4; cursor: default !important; pointer-events: none;',
            ];
        }
        

        return view('user.pemilihan',compact('pemilihan','calon','id_user','dec','info'));
    }

    public function store(Request $request)
    {
        $this->UserAuthCheck();
        $id_user = Session::get('id_user');
        $messages = [
        'unique' => 'Anda Sudah Melakukan Pemilihan!'
        ];

        $request->validate([ 'id_pemilihan' => 'required',
                             'id_user' => 'unique:tbl_hasil,id_user',
                             'image' => 'file|nullable|mimes:png,jpeg,jpg|max:2000',
                             'id_calon' => 'required'
                         ]);
        $file = $request->file('image');
 
        $image = $file->getClientOriginalName();
 
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/fotouser/';
        $file->move($tujuan_upload,$image);

        $data = $request->all();
        $data['id_user'] = $id_user;
        $data['image'] = $image;
        Hasil::create($data);
        // return $data;
        return redirect()->route('user')
                         ->with('success', 'Terimakasih Atas Partisipasi Anda!');
    }

    public function show($user_hasil)
    {
        $this->UserAuthCheck();
        $id_pemilihan = Session::get('id_pemilihan');
        $cek_pemilihan = Pemilihan::where('id_pemilihan', $id_pemilihan)->get()->first();
        if (is_null($cek_pemilihan)) {
            return redirect()->route('user')->with('kosong', 'Belum Ada Pemilihan!');
        }

        $dec = decrypt($user_hasil);
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

        return view('user.show_hasil', compact( 'hasil','pie'));
        // return $pie;
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