<?php
/**
 * Created by PhpStorm.
 * User: ruslanibragimov
 * Date: 08/07/2018
 * Time: 13:26
 */

namespace App\Filters;


use App\User;

class ThreadFilter extends Filter
{
  protected $filters = ['name', 'my'];

  public function name($name)
  {
    $user = User::where('name', $name)->firstOrFail();
    return $this->builder->where('user_id', $user->id);
  }

  public function my()
  {
    return $this->builder->where('user_id', auth()->id());
  }
}