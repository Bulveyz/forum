<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
  protected $with = ['creator:id,name'];

  public function path()
  {
    return '/threads/' . $this->id;
  }

  public function creator()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
