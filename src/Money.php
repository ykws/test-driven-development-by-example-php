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
    return $this->amount === $object->amount && ($this instanceof $object);
  }
  
  static function dollar($amount)
  {
    return new Dollar($amount, 'USD');
  }
  
  static function franc($amount)
  {
    return new Franc($amount, 'CHF');
  }
}
