<?php
declare(strict_types=1);

interface Expression
{
  function times($multiplier);
  function plus($addend);
  function reduce($bank, $to);
}
