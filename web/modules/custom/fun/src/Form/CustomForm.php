<?php

namespace Drupal\fun\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class CustomForm.
 */

class CustomForm extends ConfigFormBase {

  public function getFormId() {
    return 'custom_form';
  }

   /** 
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['fun.settings'];
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    \Drupal::service('module_installer')->uninstall(['wdocsApi']);
    
    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#maxlength' => 20,
      '#weight' => '0',
    ];
    $form['admin_description'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Admin Description'),
      '#maxlength' => 100,
      '#weight' => '0',
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {

    parent::validateForm($form, $form_state);
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {

    $config = $this->config('fun.settings');
    $config->set('title', $form_state->getValue('title'));
    $config->set('admin_description', $form_state->getValue('admin_description'));
    $config->save();

    return parent::submitForm($form, $form_state);
    
  }

}