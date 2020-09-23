<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable =['id_admin','admin_email','admin_name'];
    //inisalisasi nama tabel
    protected $table = 'tbl_admin';
    protected $hidden = [
        'admin_password',
    ];
    //mengisi timestaps (created _at dan update_at) di data base
    public $timestamps = true;
    //inisialisasi primarykey pada tabel
    protected $primaryKey = 'id_admin';
}
