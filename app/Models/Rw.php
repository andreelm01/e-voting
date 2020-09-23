<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    protected $fillable =['no_rw','nama_rw','keterangan','status'];
	//inisalisasi nama tabel
	protected $table = 'tbl_rw';
	//mengisi timestaps (created _at dan update_at) di data base
    public $timestamps = true;
    //inisialisasi primarykey pada tabel
    protected $primaryKey = 'id';

    public function Rt()
    {
        return $this->hasMany(Rt::class, 'id_rw', 'id_rw');
    }
}
