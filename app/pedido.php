<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
    //
    public function mesas() {
        return $this->belongsTomany('App\mesa', 'mesa_pedido', 'pedido_id', 'mesa_id');
    }

    public function productos() {
        return $this->belongsToMany(producto::class);
    }

}