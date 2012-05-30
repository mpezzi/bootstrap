<?php

/**
 * @file
 * Provides search theme override functions for Bootstrap themes.
 */


/**
 * Implements hook_form_search_block_form_alter().
 */
function bootstrap_form_search_block_form_alter(&$form, &$form_state) {
  // Append form-search classes.
  $form['#attributes']['class'][] = 'form-search';
  $form['search_block_form']['#attributes']['class'][] = 'input-small';
  $form['search_block_form']['#attributes']['class'][] = 'search-query';
}
