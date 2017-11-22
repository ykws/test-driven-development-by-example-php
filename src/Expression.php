<?php
declare(strict_types=1);

namespace Ykws;

abstract class Expression
{
  abstract function times($multiplier);
  abstract function reduce($bank, $to);
  
  function plus($addend)
  {
    return new Sum($this, $addend);
  }
}
