<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class MoneyTest extends TestCase
{
  public function testMultiplication(): void
  {
    $five = new Dollar(5);
    $product = $five->times(2);
    $this->assertEquals(10, $product->amount);
    $product = $five->times(3);
    $this->assertEquals(15, $product->amount);
  }
  
  public function testEquality(): void
  {
    $this->assertTrue(new Dollar(5).equals(new Dollar(5)));
  }
}
