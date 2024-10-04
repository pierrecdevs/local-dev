<?php

declare(strict_types=1);

namespace Drupal\snippets\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\Attribute\FieldFormatter;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Plugin implementation of the 'Snippets default' formatter.
 *
 */
#[FieldFormatter(
  id: "snippets_default",
  label: new TranslatableMarkup("Snippets default"),
  field_types: ["snippets_code"],
)]
final class SnippetsDefaultFormatter extends FormatterBase
{

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode): array
  {
    $element = [];
    foreach ($items as $delta => $item) {
      $element[$delta] = [
        '#theme' => 'snippets_default',
        '#source_description' => Html::escape($item->value),
        '#source_code' => Html::decodeEntities($item->source_code),
      ];
    }
    return $element;
  }
}
