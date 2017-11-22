<?php
declare(strict_types=1);

require_once 'src/Money.php';

final class Dollar extends Money
{
  function __construct($amount)
  {
    $this->amount = $amount;
    $this->currency = 'USD';
  }
  
  function times($multiplier)
  {
    return new Dollar($this->amount * $multiplier);
  }
}
