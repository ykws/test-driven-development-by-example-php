<?php
declare(strict_types=1);

class Money
{
  protected $amount;
  
  public function equals($object)
  {
    return $this->amount === $object->amount;
  }
}
