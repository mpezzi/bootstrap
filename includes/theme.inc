<?php

/**
 * @file
 * Provides misc theme override functions for Bootstrap themes.
 */


/**
 * Returns HTML for a breadcrumb trail.
 */
function bootstrap_breadcrumb(&$variables) {
  $breadcrumb = $variables['breadcrumb'];
  $divider = '/';

  if ( !empty($breadcrumb) ) {
   // Provide a navigational heading to give context for breadcrumb links to
   // screen-reader users. Make the heading invisible with .element-invisible.
   $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
   $output .= '<ul class="breadcrumb">';
   foreach ( $breadcrumb as $i => $value ) {
     $output .= '<li>';
     $output .= $value;
     if ( $i + 1 < count($breadcrumb) ) {
       $output .= '<span class="divider">' . $divider . '</span>';
     }
     $output .= '</li>';
   }
   $output .= '</ul>';

   return $output;
  }
}

/**
 * Returns HTML for system messages.
 */
function bootstrap_status_messages(&$vars) {
  $output = '';

  // Convert Drupal's message types to Bootstrap types.
  $bootstrap_types = array(
    'status' => 'success',
    'error' => 'error',
    'warning' => 'error',
    'notice' => 'info',
  );

  foreach ( drupal_get_messages($vars['display']) as $type => $messages ) {
    $type = isset($bootstrap_types[$type]) ? $bootstrap_types[$type] : $type;

    $output .= "<div class=\"alert alert-$type\">\n";
    $output .= "<a class=\"close\" href=\"#\">x</a>\n";

    if ( count($messages) > 1 ) {
      $output .= "<ul>\n";
      foreach ( $messages as $message ) {
        $output .= "<li>" . $message . "</li>\n";
      }
      $output .= "</ul>";
    }
    else {
      $output .= $messages[0];
    }

    $output .= "</div>\n";
  }

  return $output;
}
