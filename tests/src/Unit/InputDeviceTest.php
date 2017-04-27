<?php

namespace Drupal\Tests\calculator\Unit;

use Drupal\Tests\UnitTestCase;
use Drupal\calculator\ArithmeticInterface;
use Drupal\calculator\InputDevice;
use Drupal\calculator\InputDeviceInterface;

/**
 * @coversDefaultClass \Drupal\calculator\InputDevice
 * @group calculator
 */
class InputDeviceTest extends UnitTestCase {

  public function testGetResult() {
    $arithmetic = $this->prophesize(ArithmeticInterface::class);
    $arithmetic->sum(2, 2)->willReturn(4);
    $input_device = new InputDevice($arithmetic->reveal());
    $input_device
      ->buttonPress(InputDeviceInterface::TWO)
      ->buttonPress(InputDeviceInterface::ADDITION)
      ->buttonPress(InputDeviceInterface::TWO)
      ->buttonPress(InputDeviceInterface::EQUALS);

    $this->assertEquals(4, $input_device->getResult());
  }

}
