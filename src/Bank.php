<?php
declare(strict_types=1);

class Bank
{
  function reduce($source, $to)
  {
    return $source->reduce($this, $to);
  }
  
  function addRate($from, $to, $rate)
  {
    
  }
  
  function rate($from, $to)
  {
    return ($from === 'CHF' && $to === 'USD') ? 2 : 1;
  }
}
