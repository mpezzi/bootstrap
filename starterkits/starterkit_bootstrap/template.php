<?php

/**
 * @file
 * Contains theme override functions and preprocess functions for theme.
 */

/**
 * Implements hook_form_alter().
 */
/* -- Delete this line if you want to use this function
function starterkit_bootstrap_form_horizontal(&$form, &$form_state, $form_id) {
  // Form IDs to present in the horizontal layout.
  $form_ids = array(
    'user_register_form',
    'user_login',
    'user_pass',
    'user_profile_form',
  );

  $form['#horizontal'] = in_array($form_id, $form_ids);
}
// */