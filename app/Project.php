<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  protected $fillable = [
    'title',
    'image',
    'company_id',
    'start_date',
    'end_date',
    'address',
    'postcode',
    'city',
    'state',
    'country',
    'website_url',
  ];

  public function companies()
  {
    return $this->belongsTo(Company::class);
  }

  public function values()
  {
    return $this->belongsToMany(Value::class);
  }

  public function users()
  {
    return $this->belongsToMany(User::class);
  }
}
