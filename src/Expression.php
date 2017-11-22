<?php
declare(strict_types=1);

require_once 'src/Sum.php';

abstract class Expression
{
  abstract function times($multiplier);
  abstract function reduce($bank, $to);
  
  function plus($addend)
  {
    return new Sum($this, $addend);
  }
}
