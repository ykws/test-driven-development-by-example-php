<?php
declare(strict_types=1);

require_once 'src/Expression.php';

class Money extends Expression
{
  protected $amount;
  protected $currency;
  
  function __construct($amount, $currency)
  {
    $this->amount = $amount;
    $this->currency = $currency;
  }
  
  function amount()
  {
    return $this->amount;
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
  
  function reduce($bank, $to)
  {
    $rate = $bank->rate($this->currency, $to);
    return new Money($this->amount / $rate, $to);
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
