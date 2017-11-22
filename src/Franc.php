<?php
declare(strict_types=1);

final class Franc
{
  private $amount;
  
  function __construct($amount)
  {
    $this->amount = $amount;
  }
  
  function times($multiplier)
  {
    return new Franc($this->amount * $multiplier);
  }
  
  public function equals($object)
  {
    return $this->amount === $object->amount;
  }
}
