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

    /*
     * Stamboeknummer is valid when the modulo (97) of the first 9 digits are
     * equal to the last two digits of the stamboeknummer.
     */
    // Get first 9 digits and take modulo 97.
    $modulo = (intval($value / 100) % 97);
    // Get last two digits
    $controlegetal = round((($value / 100) - intval($value / 100)) * 100);
    // If both are not equal, give error.
    if ($modulo != $controlegetal) {
      $this->context->addViolation($constraint->message, [
        '%value' => $value,
      ]);
    }
  }

}