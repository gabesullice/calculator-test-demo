<?php

namespace Drupal\calculator;

use Symfony\Component\DependencyInjection\ContainerInterface;

class InputDevice implements InputDeviceInterface {

  /**
   * The first number of the operation.
   */
  protected $register0;

  /**
   * The second number of the operation.
   */
  protected $register1;

  /**
   * The type of operation.
   */
  protected $operation;

  /**
   * The result of an operation.
   */
  protected $result;

  /**
   * The arithmetic service.
   */
  protected $arithmetic;

  public function __construct(ArithmeticInterface $arithmetic) {
    $this->arithmetic = $arithmetic;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('calculator.arithmetic')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function buttonPress($button) {
    switch ($button) {
      case InputDeviceInterface::ADDITION:
        $this->operation = InputDeviceInterface::ADDITION;
        break;
      case InputDeviceInterface::EQUALS:
        $this->doOperation();
        break;
      default:
        if (!isset($this->register0)) {
          $this->register0 = $button;
        }
        else {
          $this->register1 = $button;
        }
    }
    return $this;
  }

  public function getResult() {
    return $this->result;
  }

  protected function doOperation() {
    switch ($this->operation) {
      case InputDeviceInterface::ADDITION:
        $this->result = $this->arithmetic->sum(
          $this->register0,
          $this->register1
        );
    }
  }

}
