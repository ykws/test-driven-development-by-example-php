<?php
declare(strict_types=1);

require_once 'src/Dollar.php';
require_once 'src/Franc.php';

class Money
{
  protected $amount;
  protected $currency;
  
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
    return new Dollar($amount);
  }
  
  static function franc($amount)
  {
    return new Franc($amount);
  }
}
