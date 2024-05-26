<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class picture extends Model
{
    protected $table = 'picture';

    public function album(){
        return $this->belongsTo(album::class);
    }
}
