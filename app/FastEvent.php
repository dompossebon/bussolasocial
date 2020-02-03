<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FastEvent extends Model
{
    //
//    use SoftDeletes;

    protected $fillable = ['title', 'start', 'end', 'color'];

    public function event()
    {
        return $this->hasMany(Event::class, 'fast_events_id')->orderBy('start', 'Asc');
    }
}
