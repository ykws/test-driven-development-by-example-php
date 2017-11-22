<?php
declare(strict_types=1);

interface Expression
{
  function reduce($bank, $to);
}
