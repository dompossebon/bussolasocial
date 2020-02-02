<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    //
//    protected $fillable=['nome'];

//    public function telefone()
//    {
////        return $this->hasMany(Telefone::class, 'pessoa_id');
//        return $this->hasMany(Telefone::class, 'pessoa_id');
//    }
    public function telefones()
    {
        return $this->hasMany(Telefone::class, 'pessoa_id');
    }
}
