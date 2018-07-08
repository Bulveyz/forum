<?php

namespace App;

use App\Filters\ThreadFilter;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
  protected $with = ['creator:id,name'];

  public function path()
  {
    return '/threads/'. $this->channel->name . '/' . $this->id;
  }

  public function creator()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function channel()
  {
    return $this->belongsTo(Channel::class, 'channel_id');
  }

  public function scopeFilter($query, ThreadFilter $filter)
  {
    return $filter->filter($query);
  }
}
