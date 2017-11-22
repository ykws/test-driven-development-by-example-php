<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once 'src/Money.php';

final class MoneyTest extends TestCase
{
  public function testMultiplication(): void
  {
    $this->assertEquals(Money::dollar(10), Money::dollar(5)->times(2));
    $this->assertEquals(Money::dollar(15), Money::dollar(5)->times(3));
  }
  
  public function testEquality(): void
  {
    $this->assertTrue(Money::dollar(5)->equals(Money::dollar(5)));
    $this->assertFalse(Money::dollar(5)->equals(Money::dollar(6)));
    $this->assertFalse(Money::franc(5)->equals(Money::dollar(5)));
  }
  
  public function testCurrency(): void
  {
    $this->assertEquals('USD', Money::dollar(1)->currency());
    $this->assertEquals('CHF', Money::franc(1)->currency());
  }
  
  public function testSimpleAddition(): void
  {
    $five = Money::dollar(5);
    $sum = $five->plus($five);
    $bank = new Bank();
    $reduced = $bank->reduce(sum, 'USD');
    $this->assertEquals(Money::dollar(10), $reduced);
  }
}
