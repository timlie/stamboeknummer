<?php

namespace Drupal\stamboeknummer\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'stamboeknummer' field widget type.
 *
 * @FieldWidget(
 *   id = "stamboeknummer_default_widget",
 *   label = @Translation("Stamboeknummer text field"),
 *   field_types = {
 *     "stamboeknummer"
 *   }
 * )
 */

class StamboeknummerDefaultWidget extends WidgetBase {

  /**
   * Define the form for the field type.
   *
   * Inside this method we can define the form used to edit the field type.
   *
   * Here there is a list of allowed element types: https://goo.gl/XVd4tA
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $value = isset($items[$delta]->value) ? $items[$delta]->value : '';
    $element += array(
      '#type' => 'textfield',
      '#default_value' => $value,
      '#size' => 11,
      '#maxlength' => 11,
    );

    return array('value' => $element);
  }
}