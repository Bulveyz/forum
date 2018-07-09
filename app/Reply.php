<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{

    protected $guarded = [];
    protected $with = ['owner:id,name,email'];

    public function owner()
    {
      return $this->belongsTo(User::class, 'user_id');
    }
}
