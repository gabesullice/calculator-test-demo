<?php

namespace Drupal\calculator;

interface InputDeviceInterface {

  const ZERO  = 0;
  const ONE   = 1;
  const TWO   = 2;
  const THREE = 3;
  const FOUR  = 4;
  const FIVE  = 5;
  const SIX   = 6;
  const SEVEN = 7;
  const EIGHT = 8;
  const NINE  = 9;
  const ADDITION  = '+';
  const EQUALS    = '=';

  /**
   * Records a particular button press.
   *
   * @param mixed $button
   *   The button that was pressed.
   * @return \Drupal\calculator\InputDeviceInterface
   */
  public function buttonPress($button);

  /**
   * Returns the current result.
   *
   * @return mixed
   *   The result of the previous operation.
   */
  public function getResult();

}
