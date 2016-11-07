<?php

namespace Drupal\stamboeknummer\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'stamboeknummer' field type.
 *
 * @FieldType(
 *   id = "stamboeknummer",
 *   label = @Translation("Stamboeknummer for education"),
 *   description = @Translation("Stamboeknummer field for education employees."),
 *   category = @Translation("Custom"),
 *   default_widget = "stamboeknummer_default_widget",
 *   default_formatter = "stamboeknummer_default_formatter"
 * )
 */
class StamboeknummerItem extends FieldItemBase {
  /**
   * Field type schema definition.
   *
   * Inside this method we define the database schema used to store data for
   * our field type.
   *
   * Here there is a list of allowed column types: https://goo.gl/YY3G7s
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return array(
      'columns' => array(
        'value' => array(
          'type' => 'int',
          'size' => 'big',
          'not null' => FALSE,
        ),
      ),
    );
  }

  /**
   * Field type properties definition.
   *
   * Inside this method we define all the fields (properties) that our
   * custom field type will have.
   *
   * Here there is a list of allowed property types: https://goo.gl/sIBBgO
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['value'] = DataDefinition::create('integer')
      ->setLabel(t('Stamboeknummer value'));

    return $properties;
  }

  /**
   * Define when the field type is empty.
   *
   * This method is important and used internally by Drupal. Take a moment
   * to define when the field fype must be considered empty.
   */
  public function isEmpty() {
    $value = $this->get('value')->getValue();
    return $value === NULL || $value === '';
  }
}