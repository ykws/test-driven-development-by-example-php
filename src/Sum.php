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
}
