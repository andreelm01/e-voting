<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

class IndexController extends Controller
{
    public function index()
    {
    	return view('user.index');
    }

    public function send_email(Request $request)
    {
    	try{
            Mail::send(['html' => 'user.email'], 
                array('nama' => $request->nama,
                        'email' => $request->email,
                        'isi' => $request->isi),
                 function($pesan) use($request){
                $pesan->to($request->penerima,'E-Voting')->subject('Question For Barnox Developer');
                $pesan->from(env('MAIL_USERNAME','ukmmaticofficial@gmail.com'),'E-Voting Barnox');
            });
        }catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }

        return redirect()->route('index')
                         ->with('success', 'Pesan Berhasil Di Kirim!');
    }
}
