<?php
/**
 * @file
 * Contains \Drupal\test_twig\Controller\TestTwigController.
 */
 
namespace Drupal\fun\Controller;
 
use Drupal\Core\Controller\ControllerBase;
 
class FunController extends ControllerBase {
  public function content() {

    $config = \Drupal::configFactory()->getEditable('fun.settings');
    $fun_title = $config->get('title');
    $fun_admin_description = $config->get('admin_description');

    $all_roles = \Drupal::currentUser()->getRoles();

    $has_admin_role = FALSE;
    if (in_array("administrator", $all_roles)) {
      $has_admin_role = TRUE;
    }

    $is_anonymous = FALSE;
    if (\Drupal::currentUser()->isAnonymous()) {
      $is_anonymous = TRUE;
    }

    return [
      '#theme' => 'fun_template',
      '#fun_title' => $fun_title,
      '#fun_admin_description' => $fun_admin_description,
      '#has_admin_role' => $has_admin_role,
      '#is_anonymous' => $is_anonymous
    ];
 
  }
}
