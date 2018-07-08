<?php
/**
 * Created by PhpStorm.
 * User: ruslanibragimov
 * Date: 08/07/2018
 * Time: 13:20
 */

namespace App\Filters;

use Illuminate\Http\Request;

abstract class Filter
{
  protected $builder, $requiest;
  protected $filters = [];

  /**
   * Filter constructor.
   * @param $requiest
   */
  public function __construct(Request $requiest)
  {
    $this->requiest = $requiest;
  }

  public function filter($builder)
  {
    $this->builder = $builder;

    foreach ($this->getFilters() as $filter => $value) {
      if (method_exists($this, $filter)) {
        $this->$filter($value);
      }
    }
  }

  public function getFilters()
  {
    return $this->requiest->only($this->filters);
  }
}