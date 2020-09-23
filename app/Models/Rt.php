<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    protected $fillable =['no_rt','nama_rt','no_rw','keterangan','status','id_rt'
						];
	//inisalisasi nama tabel
	protected $table = 'tbl_rt';
	//mengisi timestaps (created _at dan update_at) di data base
    public $timestamps = true;
    //inisialisasi primarykey pada tabel
    protected $primaryKey = 'id';

    public function Rw()
    {
        return $this->belongsTo(Rw::class, 'id_rw', 'id_rw');
    }
}
