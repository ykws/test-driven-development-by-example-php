<?php
declare(strict_types=1);

require_once 'src/Dollar.php';
require_once 'src/Franc.php';

class Money
{
  protected $amount;
  protected $currency;
  
  function __construct($amount, $currency)
  {
    $this->amount = $amount;
    $this->currency = $currency;
  }
  
  function currency()
  {
    return $this->currency;
  }
  
  public function equals($object)
  {
    return $this->amount === $object->amount && $this->currency() === $object->currency();
  }
  
  function times($multiplier)
  {
    return new Money($this->amount * $multiplier, $this->currency);
  }
  
  static function dollar($amount)
  {
    return new Money($amount, 'USD');
  }
  
  static function franc($amount)
  {
    return new Money($amount, 'CHF');
  }
}
