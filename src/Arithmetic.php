<?php

namespace Drupal\calculator;

class Arithmetic implements ArithmeticInterface {

  /**
   * {@inheritdoc}
   */
  public function sum($x, $y) {
    return $x + $y;
  }

}
