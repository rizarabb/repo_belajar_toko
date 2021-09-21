<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class costumers extends Model
{
    protected $table = 'costumers';
    public $timestamps = false;

    protected $fillable = ['nama_costumers', 'username', 'password', 'alamat', 'no_telp'];
    //
}
