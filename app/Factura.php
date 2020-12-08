<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    public function Pedido() {
        return $this->belongsTo('App\Pedido', 'prodido_id', 'id');
    }
}
