<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public function problem() {
        return $this->hasMany('App\Problem');
    }
}
