<?php
declare(strict_types=1);

require_once 'src/Money.php';

final class Franc extends Money
{
  function __construct($amount)
  {
    $this->amount = $amount;
    $this->currency = 'CHF';
  }
  
  function times($multiplier)
  {
    return new Franc($this->amount * $multiplier);
  }
}
