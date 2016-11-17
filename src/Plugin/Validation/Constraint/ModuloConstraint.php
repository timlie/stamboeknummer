<?php

namespace Drupal\stamboeknummer\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Checks if an entity field has a unique value.
 *
 * @Constraint(
 *   id = "Modulo",
 *   label = @Translation("Modulo field constraint", context = "Validation"),
 * )
 */
class ModuloConstraint extends Constraint {

  public $message = '%value is not a correct stamboeknummer.';

}