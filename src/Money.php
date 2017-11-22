<?php
declare(strict_types=1);

require_once 'src/Expression.php';
require_once 'src/Sum.php';

class Money implements Expression
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
  
  function plus($addend)
  {
    return new Sum($this, $addend);
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
