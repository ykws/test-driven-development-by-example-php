<?php
declare(strict_types=1);

namespace Ykws;

class Bank
{
  private $rates = array();
  
  function reduce($source, $to)
  {
    return $source->reduce($this, $to);
  }
  
  function addRate($from, $to, $rate)
  {
    $this->rates[$from][$to] = $rate;
  }
  
  function rate($from, $to)
  {
    if ($from === $to) return 1;
    return $this->rates[$from][$to];
  }
}
