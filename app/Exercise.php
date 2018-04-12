<?php

namespace App;
use App\BodyArea;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [
      'name', 'srcImage'
    ];

    public function bodyAreas() {
      return $this->belongsToMany(BodyArea::class);
    }

    public function routineDetails() {
      return $this->hasMany(BodyArea::class);
    }
}
