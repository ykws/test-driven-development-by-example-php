<?php
declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Ykws\Money;
use Ykws\Bank;
use Ykws\Sum;

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
    $reduced = $bank->reduce($sum, 'USD');
    $this->assertEquals(Money::dollar(10), $reduced);
  }
  
  public function testPlusReturnsSum(): void
  {
    $five = Money::dollar(5);
    $result = $five->plus($five);
    $sum = $result;
    $this->assertEquals($five, $sum->augend);
    $this->assertEquals($five, $sum->addend);
  }
  
  public function testReduceSum(): void
  {
    $sum = new Sum(Money::dollar(3), Money::dollar(4));
    $bank = new Bank();
    $result = $bank->reduce($sum, 'USD');
    $this->assertEquals(Money::dollar(7), $result);
  }
  
  public function testReduceMoney(): void
  {
    $bank = new Bank();
    $result = $bank->reduce(Money::dollar(1), 'USD');
    $this->assertEquals(Money::dollar(1), $result);
  }
  
  public function testReduceMoneyDifferentCurrency(): void
  {
    $bank = new Bank();
    $bank->addRate('CHF', 'USD', 2);
    $result = $bank->reduce(Money::franc(2), 'USD');
    $this->assertEquals(Money::dollar(1), $result);
  }
  
  public function testIndetityRate(): void
  {
    $bank = new Bank();
    $this->assertEquals(1, $bank->rate('USD', 'USD'));
  }
  
  public function testMixedAddition(): void
  {
    $fiveBucks = Money::dollar(5);
    $tenFrancs = Money::franc(10);
    $bank = new Bank();
    $bank->addRate('CHF', 'USD', 2);
    $result = $bank->reduce($fiveBucks->plus($tenFrancs), 'USD');
    $this->assertEquals(Money::dollar(10), $result);
  }
  
  public function testSumPlusMoney(): void
  {
    $fiveBucks = Money::dollar(5);
    $tenFrancs = Money::franc(10);
    $bank = new Bank();
    $bank->addRate('CHF', 'USD', 2);
    $sum = new Sum($fiveBucks, $tenFrancs);
    $sum = $sum->plus($fiveBucks);
    $result = $bank->reduce($sum, 'USD');
    $this->assertEquals(Money::dollar(15), $result);
  }
  
  public function testSumTimes(): void
  {
    $fiveBucks = Money::dollar(5);
    $tenFrancs = Money::franc(10);
    $bank = new Bank();
    $bank->addRate('CHF', 'USD', 2);
    $sum = new Sum($fiveBucks, $tenFrancs);
    $sum = $sum->times(2);
    $result = $bank->reduce($sum, 'USD');
    $this->assertEquals(Money::dollar(20), $result);
  }
}
