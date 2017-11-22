<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class MoneyTest extends TestCase
{
  public function testMultiplication(): void
  {
    $five = new Dollar(5);
    $five->times(2);
    $this->assertEquals(10, $five->amount);
    $five->times(3);
    $this->assertEquals(15, $five->amount);
  }
}
