<?php

/**
 * @file
 * Provides form elements for theme settings alter.
 */


/**
 * Implements hook_form_system_theme_settings_alter().
 */
function bootstrap_form_system_theme_settings_alter(&$form, $form_state) {
  // Bootstrap Path settings.
  $form['path'] = array(
    '#type' => 'fieldset',
    '#title' => t('Paths'),
  );
  $form['path']['bootstrap_path_css'] = array(
    '#type' => 'textfield',
    '#title' => t('CSS'),
    '#default_value' => theme_get_setting('bootstrap_path_css'),
  );
  $form['path']['bootstrap_path_css_responsive'] = array(
    '#type' => 'textfield',
    '#title' => t('CSS (Responsive)'),
    '#default_value' => theme_get_setting('bootstrap_path_css_responsive'),
  );
  $form['path']['bootstrap_path_js'] = array(
    '#type' => 'textfield',
    '#title' => t('JS'),
    '#default_value' => theme_get_setting('bootstrap_path_js'),
  );

  // Bootstrap Scaffolding settings.
  $form['scaffolding'] = array(
    '#type' => 'fieldset',
    '#title' => t('Scaffolding'),
  );
  $form['scaffolding']['bootstrap_responsive'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable responsive grid'),
    '#default_value' => theme_get_setting('bootstrap_responsive'),
  );

  // Bootstrap Navigation settings.
  $form['navbar'] = array(
    '#type' => 'fieldset',
    '#title' => t('Navbar'),
  );
  $form['navbar']['bootstrap_navbar'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable navbar'),
    '#default_value' => theme_get_setting('bootstrap_navbar'),
  );
  $form['navbar']['bootstrap_navbar_fixed'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable fixed navbar'),
    '#default_value' => theme_get_setting('bootstrap_navbar_fixed'),
  );

  // Navigation settings.
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

  // Breadcrumb settings.
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
