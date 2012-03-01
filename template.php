<?php

/**
 * @file
 * Contains theme override functions and preprocess functions for Bootstrap theme.
 */

/**
 * Include theme component files.
 */
require dirname(__FILE__) . '/includes/form.inc';
require dirname(__FILE__) . '/includes/list.inc';
require dirname(__FILE__) . '/includes/pager.inc';
require dirname(__FILE__) . '/includes/tab.inc';
require dirname(__FILE__) . '/includes/table.inc';
require dirname(__FILE__) . '/includes/theme.inc';

/**
 * Override or insert variables into page.tpl.php
 */
function bootstrap_preprocess_page(&$vars) {
  global $user;

  // Build menu links.
  $vars['nav_links'] = theme('links', array(
    'links' => $vars['main_menu'],
    'attributes' => array('class' => array('nav')),
  ));

  $vars['subnav_links'] = theme('links', array(
    'links' => $vars['main_menu'],
    'attributes' => array('class' => array('nav', 'nav-pills')),
  ));

  $vars['user_links'] = theme('links', array(
    'links' => $vars['secondary_menu'],
    'attributes' => array('class' => array('dropdown-menu')),
  ));

  // Build user navigation buttons.
  $vars['user_links_anonymous_text'] = t('Sign in');
  $vars['user_links_anonymous_link'] = 'user/login';
  $vars['user_links_authenticated_text'] = isset($user->name) ? check_plain($user->name) : '';

  // Determine content and sidebar layout, and set grid sizes.
  if ( $vars['page']['sidebar_first'] && $vars['page']['sidebar_second'] ) {
    $vars['page']['sidebar_first']['#grid'] = 3;
    $vars['page']['content']['#grid'] = 6;
    $vars['page']['sidebar_second']['#grid'] = 3;
  }
  elseif ( !$vars['page']['sidebar_first'] && $vars['page']['sidebar_second'] ) {
    $vars['page']['content']['#grid'] = 9;
    $vars['page']['sidebar_second']['#grid'] = 3;
  }
  elseif ( $vars['page']['sidebar_first'] && !$vars['page']['sidebar_second'] ) {
    $vars['page']['sidebar_first']['#grid'] = 3;
    $vars['page']['content']['#grid'] = 9;
  }
  else {
    $vars['page']['content']['#grid'] = 12;
  }
}

/**
 * Implements hook_preprocess_region().
 */
function bootstrap_preprocess_region(&$vars) {
  // Add spanX class to region if #grid property is defined.
  if ( isset($vars['elements']['#grid']) ) {
    $vars['classes_array'][] = 'span' . $vars['elements']['#grid'];
  }
}
