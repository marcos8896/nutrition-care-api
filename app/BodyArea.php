<?php

namespace App;
use App\Exercise;

use Illuminate\Database\Eloquent\Model;

class BodyArea extends Model
{
    protected $fillable = [ 'description' ];

    public function exercises() {
      return $this->belongsToMany(Exercise::class);
    }
}
