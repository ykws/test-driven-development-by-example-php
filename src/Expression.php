<?php
declare(strict_types=1);

interface Expression
{
  function plus($addend);
  function reduce($bank, $to);
}
