<?php

/**
 * @file
 * Theme settings for the Kingly theme.
 */

use Drupal\Core\Form\FormStateInterface;

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function kingly_theme_form_system_theme_settings_alter(array &$form, FormStateInterface $form_state) {
  // Add a new setting for the theme.
  $form['kingly_theme_settings'] = [
    '#type' => 'details',
    '#title' => t('Kingly Theme Settings'),
    '#open' => TRUE,
  ];

  $form['kingly_theme_settings']['nl_design_system_theme_css_name'] = [
    '#type' => 'textfield',
    '#title' => t('NL Design System theme css name'),
    '#default_value' => theme_get_setting('nl_design_system_theme_css_name'),
    '#description' => t('Enter the NL Design System theme css name (xxx-theme).'),
  ];

  // Submit handler for the form.
  $form['#submit'][] = 'kingly_theme_form_system_theme_settings_submit';
}

/**
 * Form submission handler for the theme settings form.
 */
function kingly_theme_form_system_theme_settings_submit(array &$form, FormStateInterface $form_state) {
  // Save the settings.
  \Drupal::configFactory()->getEditable('kingly_theme.settings')
    ->set('nl_design_system_theme_css_name', $form_state->getValue('nl_design_system_theme_css_name'))
    ->save();
}
