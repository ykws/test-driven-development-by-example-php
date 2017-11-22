<?php
declare(strict_types=1);

require_once 'src/Money.php';

final class Franc extends Money
{
  function __construct($amount, $currency)
  {
    parent::__construct($amount, $currency);
  }
}
