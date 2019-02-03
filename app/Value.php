<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
  public function projects()
  {
    return $this->belongsToMany(Project::class);
  }

  public function users()
  {
    return $this->belongsToMany(User::class);
  }
}
