<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    //
//    protected $fillable=['nome'];

//    public function pessoa()
//    {
////        return $this->belongsTo(Pessoa::class, 'pessoa_id');

//    }

    // Relacionamento com usuários
    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id');
//        return $this->belongsTo('Pessoa');
    }
}
