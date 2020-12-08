<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Curso extends Model
{
    //
    public function aprendices()
    {
    	return $this->BelonsgToMany(User::class);
    }
}
