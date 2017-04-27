<?php

namespace Drupal\Tests\calculator\Unit;

use Drupal\Tests\UnitTestCase;
use Drupal\calculator\Arithmetic;

/**
 * @coversDefaultClass \Drupal\calculator\Arithmetic
 * @group calculator
 */
class ArithmeticTest extends UnitTestCase {

  /**
   * The class being tested.
   *
   * @var \Drupal\calculator\ArithmeticInterface
   */
  protected $arithmetic;

  /**
   * Sets up an instance of Arithmetic.
   */
  public function setUp() {
    parent::setUp();
    $this->arithmetic = new Arithmetic();
  }

  public function testSum() {
    $cases = [
      ['input' => [1, 1], 'expect' => 2],
      ['input' => [1, -1], 'expect' => 0],
      ['input' => [-1, -1], 'expect' => -2],
    ];

    foreach ($cases as $case) {
      $actual = $this->arithmetic->sum($case['input'][0], $case['input'][1]);
      $this->assertEquals(
        $case['expect'],
        $actual,
        'Should properly sum positives and negatives.'
      );
    }
  }

}
