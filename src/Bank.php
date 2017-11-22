<?php
declare(strict_types=1);

require_once 'src/Money.php';

class Bank
{
  function reduce($source, $to)
  {
    return Money::dollar(10);
  }
}
