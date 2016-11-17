<?php

namespace Drupal\stamboeknummer\Plugin\DataType;

use Drupal\Core\TypedData\TypedData;


/**
 * The biginteger data type.
 *
 * The plain value of an biginteger is a regular PHP biginteger. For setting the value
 * any PHP variable that casts to an biginteger may be passed.
 *
 * @DataType(
 *   id = "biginteger",
 *   label = @Translation("Biginteger")
 * )
 */
class BigIntegerData extends TypedData {

  /**
   * The data value.
   *
   * @var mixed
   */
  protected $value;

  /**
   * {@inheritdoc}
   */
  public function getValue() {
    return $this->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setValue($value, $notify = TRUE) {
    $this->value = $value;
    // Notify the parent of any changes.
    if ($notify && isset($this->parent)) {
      $this->parent->onChange($this->name);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getCastedValue() {
    return (int) $this->value;
  }

}