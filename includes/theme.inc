<?php

/**
 * @file
 * Provides misc theme override functions for Bootstrap themes.
 */


/**
 * Implements hook_css_alter().
 */
function bootstrap_css_alter(&$css) {
  unset($css['modules/system/system.menus.css']);
  unset($css['modules/system/system.messages.css']);
  unset($css['modules/system/system.theme.css']);
}

/**
 * Returns HTML for a breadcrumb trail.
 */
function bootstrap_breadcrumb(&$variables) {
  $breadcrumb = $variables['breadcrumb'];
  $divider = theme_get_setting('bootstrap_breadcrumb_divider');

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

   if ( theme_get_setting('bootstrap_breadcrumb') == 'yes' ) {
     return $output;
   }
   else {
     return '';
   }
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

    $output .= "<div class=\"alert alert-$type fade in\" data-dismiss=\"alert\">\n";
    $output .= "<a class=\"close\" href=\"#\">&times;</a>\n";

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

/**
 * Returns HTML for a set of links.
 */
function bootstrap_links($variables) {
  $links = $variables['links'];
  $attributes = $variables['attributes'];
  $heading = $variables['heading'];
  global $language_url;
  $output = '';

  if (count($links) > 0) {
    $output = '';

     // Treat the heading first if it is present to prepend it to the
   // list of links.
   if (!empty($heading)) {
     if (is_string($heading)) {
       // Prepare the array that will be used when the passed heading
       // is a string.
       $heading = array(
         'text' => $heading,
         // Set the default level of the heading. 
         'level' => 'h2',
       );
     }
     $output .= '<' . $heading['level'];
     if (!empty($heading['class'])) {
       $output .= drupal_attributes(array('class' => $heading['class']));
     }
     $output .= '>' . check_plain($heading['text']) . '</' . $heading['level'] . '>';
   }

   $output .= '<ul' . drupal_attributes($attributes) . '>';

   $num_links = count($links);
   $i = 1;

   foreach ($links as $key => $link) {
     $class = array($key);

     if ( isset($link['class']) && !empty($link['class']) ) {
       $class = array_merge($class, $link['class']);
     }

     // Add first, last and active classes to the list of links to help out themers.
     if ($i == 1) {
       $class[] = 'first';
     }
     if ($i == $num_links) {
       $class[] = 'last';
     }
     if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))
          && (empty($link['language']) || $link['language']->language == $language_url->language)) {
       $class[] = 'active';
     }
     $output .= '<li' . drupal_attributes(array('class' => $class)) . '>';

     if (isset($link['href'])) {
       // Pass in $link as $options, they share the same keys.
       $output .= l($link['title'], $link['href'], $link);
     }
     elseif (!empty($link['title'])) {
       // Some links are actually not links, but we wrap these in <span> for adding title and class attributes.
       if (empty($link['html'])) {
         $link['title'] = check_plain($link['title']);
       }
       $span_attributes = '';
       if (isset($link['attributes'])) {
         $span_attributes = drupal_attributes($link['attributes']);
       }
       $output .= '<span' . $span_attributes . '>' . $link['title'] . '</span>';
     }

     $i++;
     $output .= "</li>\n";
   }

   $output .= '</ul>';
  }

  return $output;
}