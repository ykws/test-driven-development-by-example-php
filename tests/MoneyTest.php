<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require 'src/Dollar.php';
require 'src/Franc.php';

final class MoneyTest extends TestCase
{
  public function testMultiplication(): void
  {
    $five = new Dollar(5);
    $this->assertEquals(new Dollar(10), $five->times(2));
    $this->assertEquals(new Dollar(15), $five->times(3));
  }
  
  public function testEquality(): void
  {
    $five = new Dollar(5);
    $this->assertTrue($five->equals(new Dollar(5)));
    $this->assertFalse($five->equals(new Dollar(6)));
  }
  
  public function testFrancMultiplication(): void
  {
    $five = new Franc(5);
    $this->assertEquals(new Franc(10), $five->times(2));
    $this->assertEquals(new Franc(15), $five->times(3));
  }
}
