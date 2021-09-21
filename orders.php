<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'orders';
    public $timestamps = false;

    protected $fillable = ['id_products', 'id_costumers', 'tgl_orders'];
    //
}
