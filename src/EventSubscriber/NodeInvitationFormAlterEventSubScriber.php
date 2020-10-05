<?php

namespace Drupal\drupalup_event_hook\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Altering drupal forms with hook_event_dispatcher.
 */
class NodeInvitationFormAlterEventSubScriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    return [
      HookEventDispatcherInterface::FORM_ALTER => 'hookFormAlter',
    ];
  }

  /**
   * Altering form array from here.
   */
  public function hookFormAlter($event) {

    if ($event->getFormId() == 'node_article_edit_form') {
      $form = $event->getForm();
      $form['info'] = [
        '#type' => 'markup',
        '#markup' => '<div class="info">Ed had edited it.</div>',
      ];
      $event->setForm($form);
    }
  }

}
