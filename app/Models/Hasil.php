<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $fillable =['id_pemilihan',
    					'id_user',
                        'image',
    					'id_calon'
						];
	//inisalisasi nama tabel
	protected $table = 'tbl_hasil';
	//mengisi timestaps (created _at dan update_at) di data base
    public $timestamps = true;
    //inisialisasi primarykey pada tabel
    protected $primaryKey = 'id';

    public function pemilihan()
    {
        return $this->hasMany(Pemilihan::class, 'id_pemilihan', 'id_pemilihan');
    }

    public function calon()
    {
        return $this->belongsTo(Calon::class, 'id_calon', 'id_calon');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
