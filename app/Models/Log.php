<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable =['id_user',
    					'time_in',
    					'time_out'
						];
	//inisalisasi nama tabel
	protected $table = 'tbl_log';
	//mengisi timestaps (created _at dan update_at) di data base
    public $timestamps = true;
    //inisialisasi primarykey pada tabel
    protected $primaryKey = 'id';

    protected $dates = ['time_out'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
