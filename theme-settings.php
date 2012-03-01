<?php

/**
 * @file
 * Provides form elements for theme settings alter.
 */


/**
 * Implements hook_form_system_theme_settings_alter().
 */
function bootstrap_form_system_theme_settings_alter(&$form, $form_state) {
  $form['nav'] = array(
    '#type' => 'fieldset',
    '#title' => t('Navigation'),
  );

  $form['nav']['bootstrap_nav'] = array(
    '#type' => 'checkbox',
    '#title' => t('Nav Bar'),
    '#default_value' => theme_get_setting('bootstrap_nav'),
  );

  $form['nav']['bootstrap_nav_sub'] = array(
    '#type' => 'checkbox',
    '#title' => t('Sub Nav Bar'),
    '#default_value' => theme_get_setting('bootstrap_nav_sub'),
  );

  $form['nav']['bootstrap_nav_user'] = array(
    '#type' => 'checkbox',
    '#title' => t('User Nav'),
    '#default_value' => theme_get_setting('bootstrap_nav_user'),
  );

  $form['breadcrumb'] = array(
    '#type' => 'fieldset',
    '#title' => t('Breadcrumb'),
  );

  $form['breadcrumb']['bootstrap_breadcrumb'] = array(
    '#type' => 'select',
    '#title' => t('Breadcrumb Visibility'),
    '#default_value' => theme_get_setting('bootstrap_breadcrumb'),
    '#options' => array(
      'yes' => t('Yes'),
      'admin' => t('Only in admin section'),
      'no' => t('No'),
    ),
  );

  $form['breadcrumb']['bootstrap_breadcrumb_divider'] = array(
    '#type' => 'textfield',
    '#title' => t('Breadcrumb Divider'),
    '#description' => t('The divider to separate the breadcrumb items.'),
    '#default_value' => theme_get_setting('bootstrap_breadcrumb_divider'),
    '#size' => 5,
    '#maxlength' => 10,
  );
}
