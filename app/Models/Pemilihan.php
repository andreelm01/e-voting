<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemilihan extends Model
{
    protected $fillable =['id_pemilihan',
    					'no_rw',
						'no_rt',
                        'keterangan',
                        'status'
						];
	//inisalisasi nama tabel
	protected $table = 'tbl_pemilihan';
	//mengisi timestaps (created _at dan update_at) di data base
    public $timestamps = true;
    //inisialisasi primarykey pada tabel
    protected $primaryKey = 'id';

    public function Calon()
    {
        return $this->hasMany(Calon::class, 'id_calon', 'id_calon');
    }
    
}
