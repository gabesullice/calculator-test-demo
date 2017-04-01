<?php

namespace Drupal\Tests\calculator\Kernel;

use Drupal\KernelTests\KernelTestBase;
use Drupal\calculator\ArithmeticInterface;
use Drupal\calculator\InputDevice;
use Drupal\calculator\InputDeviceInterface;

/**
 * @coversDefaultClass \Drupal\calculator\InputDevice
 * @group calculator
 */
class InputDeviceTest extends KernelTestBase {

  public static $modules = [
    'calculator',
  ];

  public function testInputDevice() {
    $input_device = InputDevice::create($this->container);

    $result = $input_device
      ->buttonPress(InputDeviceInterface::TWO)
      ->buttonPress(InputDeviceInterface::ADDITION)
      ->buttonPress(InputDeviceInterface::TWO)
      ->buttonPress(InputDeviceInterface::EQUALS)
      ->getResult();

    $this->assertEquals(4, $result);
  }

}
