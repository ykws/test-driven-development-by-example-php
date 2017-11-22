<?php
declare(strict_types=1);

require_once 'src/Expression.php';

class Sum implements Expression
{
  public $augend;
  public $addend;
  
  public function __construct($augend, $addend)
  {
    $this->augend = $augend;
    $this->addend = $addend;
  }
  
  function times($multiplier)
  {
    return new Sum($this->augend->times($multiplier),
                   $this->addend->times($multiplier));
  }
  
  function plus($addend)
  {
    return new Sum($this, $addend);
  }
  
  function reduce($bank, $to)
  {
    $amount = $this->augend->reduce($bank, $to)->amount()
            + $this->addend->reduce($bank, $to)->amount();
    return new Money($amount, $to);
  }
}
