<?php
declare(strict_types=1);

require_once 'src/Money.php';

final class Dollar extends Money
{
  function __construct($amount, $currency)
  {
    $this->amount = $amount;
    $this->currency = $currency;
  }
  
  function times($multiplier)
  {
    return Money::dollar($this->amount * $multiplier);
  }
}
