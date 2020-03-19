<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Problem;

class Test extends Model
{
    public function problem() {
        return $this->hasMany('App\Problem');
    }

    public function problem_set() {
        return Problem::where('test_id' , $this->id)->get();
    }
}
