<?php
declare(strict_types=1);

final class Dollar
{
  public $amount;
  
  function __construct($amount)
  {
    $this->amount = $amount;
  }
  
  function times($multiplier)
  {
    $this->amount *= $multiplier;
  }
}
