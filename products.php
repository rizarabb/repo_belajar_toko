<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';
    public $timestamps = false;

    protected $fillable = ['nama_products', 'deskripsi', 'qty', 'harga'];
    //
}
