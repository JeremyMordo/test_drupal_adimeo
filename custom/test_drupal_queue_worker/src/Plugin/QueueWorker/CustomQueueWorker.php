<?php

namespace Drupal\custom_block\Plugin\QueueWorker;

/**
 *
 * @QueueWorker(
 *   id = "custom_block_queue_worker",
 *   title = @Translation("Dépublie les événements terminés."),
 *   cron = {"time" = 10}
 * )
 */
class CustomQueueWorker extends QueueWorkerBase implements ContainerFactoryPluginInterface {
  
  /**
   * {@inheritdoc}
   */
  public function processItem($evenement) {
    $evenement->status(FALSE);
    $evenement->save();
  }
}