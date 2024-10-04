<?php

declare(strict_types=1);

namespace Drupal\snippets\Plugin\Field\FieldType;

use Drupal\Component\Utility\Random;
use Drupal\Core\Field\Attribute\FieldType;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Defines the 'snippets_code' field type.
 *
 */
#[FieldType(
  id: "snippets_code",
  label: new TranslatableMarkup("Snippets code"),
  description: new TranslatableMarkup("Some description."),
  default_widget: "snippets_default",
  default_formatter: "snippets_default",
)]
final class SnippetsCodeItem extends FieldItemBase
{

  /**
   * {@inheritdoc}
   */
  public function isEmpty(): bool
  {
    return match ($this->get('value')->getValue()) {
      NULL, '' => TRUE,
      default => FALSE,
    };
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition): array
  {

    // @DCG
    // See /core/lib/Drupal/Core/TypedData/Plugin/DataType directory for
    // available data types.
    $properties['value'] = DataDefinition::create('string')
      ->setLabel(t('Snippet description'))
      ->setRequired(TRUE);

    $properties['source_code'] = DataDefinition::create('string')
      ->setLabel(t('Snippet code'))
      ->setRequired(FALSE);

    $properties['source_lang'] = DataDefinition::create('string')
      ->setLabel(t('Snippet language'))
      ->setRequired(FALSE);
    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition): array
  {

    $columns = [
      'value' => [
        'type' => 'varchar',
        'not null' => FALSE,
        'description' => 'Column description.',
        'length' => 255,
      ],
      'source_code' => [
        'type' => 'text',
        'not null' => TRUE,
        'size' => 'big',
      ],
      'source_lang' => [
        'type' => 'varchar',
        'description' => 'Language of the snippet.',
        'not null' => TRUE,
        'length' => 100,
      ],
    ];

    $schema = [
      'columns' => $columns,
      // @todo Add indexes here if necessary.
    ];

    return $schema;
  }

  /**
   * {@inheritdoc}
   */
  public static function generateSampleValue(FieldDefinitionInterface $field_definition): array
  {
    $random = new Random();
    $values['value'] = $random->word(mt_rand(1, 50));
    return $values;
  }
}
