<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once 'src/Money.php';

final class MoneyTest extends TestCase
{
  public function testMultiplication(): void
  {
    $five = Money::dollar(5);
    $this->assertEquals(Money::dollar(10), $five->times(2));
    $this->assertEquals(Money::dollar(15), $five->times(3));
  }
  
  public function testEquality(): void
  {
    $dollar = Money::dollar(5);
    $this->assertTrue($dollar->equals(Money::dollar(5)));
    $this->assertFalse($dollar->equals(Money::dollar(6)));
    $franc = Money::franc(5);
    $this->assertFalse($franc->equals($dollar));
  }
  
  public function testCurrency(): void
  {
    $this->assertEquals('USD', Money::dollar(1)->currency());
    $this->assertEquals('CHF', Money::franc(1)->currency());
  }
}
