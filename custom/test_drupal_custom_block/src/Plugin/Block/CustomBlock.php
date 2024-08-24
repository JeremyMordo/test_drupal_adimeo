<?php

namespace Drupal\custom_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\Attribute\Block;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;

/**
 * Provides a 'Hello' Block.
 */
#[Block(
  id: "custom_block",
  admin_label: t("Custom block"),
  category: t("custom block")
)]
class CustomBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
  }

  /**
   * {@inheritdoc}
   */
  public static function create(array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
    );
  }

   /**
   * {@inheritdoc}
   */
  public function build() {
    // On récupère l'évenement courant.
    // On pourrait également passé par la Request, récupérer l'id et utiliser Node::load().
    // Cette façon de faire semble plus rapide (non testé).
    $evenement = $this->getContextValue('node');
    
    // On récupère sa taxonomy.
    $evenementType = $evenement->gettype();

    $nodesToDisplay = [];

    // On récupère les 3 évenements.
    $query = \Drupal::entityQuery('node'); 
    $evenements = $query
      ->accessCheck(FALSE)
      ->condition('field_event_type', $evenementType)
      ->condition('field_daterange.end_value', $current_time, '>')
      ->sort('created')
      ->range(0, 3); 

    if (!empty($evenementNb)) {
      $nodesToDisplay[] = Node::loadMultiple($nodesToComplete);
    }

    $evenementNb = count($evenements);

    // Si il y a moins de 3 événements du même type.
    // Récupérer le nombre manquant d'événements d'une autre taxonomie.
    if ($evenementNb < 3) {
      $query = \Drupal::entityQuery('node'); 
      $nodeIdsToComplete = $query
        ->accessCheck(FALSE)
        ->condition('field_daterange.end_value', $current_time, '>')
        ->condition('field_event_type', $evenementType, '<>')
        ->sort('created')
        ->range(0, 3 - $evenementNb);
    
      $nodesToDisplay[] = Node::loadMultiple($nodesToComplete);
    }

    return [
      '#theme' => 'custom_block__evenement__full',
      '#evenements' => $nodesToDisplay,
    ];
  }
}