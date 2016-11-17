<?php

namespace Drupal\stamboeknummer\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class ModuloConstraintValidator extends ConstraintValidator {

  /**
   * {@inheritdoc}
   */
  public function validate($value, Constraint $constraint) {

    if (!isset($value)) {
      return;
    }
    // Verify that given value is even.
    $modulo = (intval($value / 100) % 97);
    print_r($modulo);
    $controlegetal = round((($value / 100) - intval($value / 100)) * 100);
    print_r($controlegetal);
    if ($modulo != $controlegetal) {
      $this->context->addViolation($constraint->message, [
        '%value' => $value,
      ]);
    }
  }

}