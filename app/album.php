<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class album extends Model
{
    protected $table = 'album';

    public function picture(){
        return $this->hasMany(picture::class);
    }
}
