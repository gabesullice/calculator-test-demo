<?php

namespace Drupal\calculator;

interface ArithmeticInterface {

  /**
   * Sums two numbers.
   *
   * @param mixed $x
   *   The first part of the sum.
   * @param mixed $y
   *   The second part of the sum.
   * @return mixed
   *   The total.
   */
  public function sum($x, $y);

}
