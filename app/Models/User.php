<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable =['id_user',
    					'nama',
                        'alamat',
                        'no_rumah',
                        'no_rt',
                        'no_rw',
                        'username',
                        'password',
                        'id_pemilihan'
						];
	//inisalisasi nama tabel
	protected $table = 'tbl_user';
	//mengisi timestaps (created _at dan update_at) di data base
    public $timestamps = true;
    //inisialisasi primarykey pada tabel
    protected $primaryKey = 'id';

    protected $hidden = [
        'password'
    ];

    public function Rt()
    {
        return $this->belongsTo(Rt::class, 'id_rt', 'id_rt');
    }

    public function Rw()
    {
        return $this->belongsTo(Rw::class, 'id_rw', 'id_rw');
    }

    public function pemilihan()
    {
        return $this->belongsTo(Pemilihan::class, 'id_pemilihan', 'id_pemilihan');
    }

    public function hasil()
    {
        return $this->belongsTo(Hasil::class, 'id_user', 'id_user');
    }

    public function calon()
    {
        return $this->belongsTo(Hasil::class, 'id_pemilihan', 'id_pemilihan');
    }
}