<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calon extends Model
{
    protected $fillable =['id_calon',
                        'id_pemilihan',
    					'nama',
						'image',
                        'keterangan',
						];
	//inisalisasi nama tabel
	protected $table = 'tbl_calon';
	//mengisi timestaps (created _at dan update_at) di data base
    public $timestamps = true;
    //inisialisasi primarykey pada tabel
    protected $primaryKey = 'id';

    public function pemilihan()
    {
        return $this->belongsTo(Pemilihan::class, 'id_pemilihan', 'id_pemilihan');
    }

    public function hasil()
    {
        return $this->hasMany(Hasil::class, 'id_calon', 'id_calon');
    }

    public function user()
    {
        return $this->hasMany(Hasil::class, 'id_pemilihan', 'id_pemilihan');
    }
}
