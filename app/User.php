<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  public function values()
  {
    return $this->belongsToMany(Value::class);
  }

  public function projects()
  {
    return $this->belongsToMany(Project::class);
  }

  /**
   * generate api_token
   */
  public function generateToken()
  {
    $this->api_token = str_random(60);
    $this->save();
    return $this->api_token;
  }
}
