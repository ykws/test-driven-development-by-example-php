<?php
declare(strict_types=1);

require_once 'src/Money.php';
require_once 'src/Sum.php';

class Bank
{
  function reduce($source, $to)
  {
    $sum = $source;
    return $sum->reduce($to);
  }
}
