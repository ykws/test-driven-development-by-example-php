<?php
declare(strict_types=1);

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
    return $this->rates[$from][$to];
  }
}
