<?php
declare(strict_types=1);

final class Dollar
{
  private $amount;
  
  function __construct($amount)
  {
    $this->amount = $amount;
  }
  
  function times($multiplier)
  {
    return new Dollar($this->amount * $multiplier);
  }
  
  public function equals($object)
  {
    return $this->amount === $object->amount;
  }
}
