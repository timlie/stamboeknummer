<?php

namespace Drupal\stamboeknummer\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'StamboeknummerDefaultFormatter' field formatter.
 *
 * @FieldFormatter(
 *   id = "stamboeknummer_default_formatter",
 *   label = @Translation("Stamboeknummer"),
 *   field_types = {
 *     "stamboeknummer"
 *   }
 * )
 */
class StamboeknummerDefaultFormatter extends FormatterBase {

  /**
   * Define how the field type is showed.
   *
   * Inside this method we can customize how the field is displayed inside
   * pages.
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = array();
    foreach ($items as $delta => $item) {
      $elements[$delta] = array('#markup' => $item->value);
    }
    return $elements;
  }
}