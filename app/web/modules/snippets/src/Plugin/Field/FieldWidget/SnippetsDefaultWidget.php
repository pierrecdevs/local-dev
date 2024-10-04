<?php

declare(strict_types=1);

namespace Drupal\snippets\Plugin\Field\FieldWidget;

use Drupal\Core\Field\Attribute\FieldWidget;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Defines the 'snippets_default' field widget.
 */
#[FieldWidget(
  id: "snippets_default",
  label: new TranslatableMarkup("Snippets default"),
  field_types: ["snippets_code"],
)]
final class SnippetsDefaultWidget extends WidgetBase
{

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state): array
  {
    $element['value'] = $element + [
      '#type' => 'textfield',
      '#default_value' => $items[$delta]->value ?? NULL,
      '#weight' => 0,
    ];

    $element['source_code'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Source Code'),
      '#default_value' => $items[$delta]->source_code ?? NULL,
      '#rows' => 5,
      '#weight' => 5,
    ];

    $element['source_lang'] = [
      '#type' => 'select',
      '#title' => $this->t('Source Language'),
      '#options' => [
        'php' => $this->t('PHP'),
        'js' => $this->t('JavaScript'),
        'sql' => $this->t('SQL'),
      ],
      '#default_value' => $items[$delta]->source_lang ?? NULL,
      '#weight' => 10,
    ];
    return $element;
  }
}
