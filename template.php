<?php

/**
 * @file
 * Contains theme override functions and preprocess functions for Bootstrap theme.
 */

/**
 * Include theme component files.
 */
require dirname(__FILE__) . '/includes/theme/form.inc';
require dirname(__FILE__) . '/includes/theme/list.inc';
require dirname(__FILE__) . '/includes/theme/pager.inc';
require dirname(__FILE__) . '/includes/theme/tab.inc';
require dirname(__FILE__) . '/includes/theme/table.inc';
require dirname(__FILE__) . '/includes/theme/theme.inc';


/**
 * Implements hook_page_alter().
 */
function bootstrap_page_alter(&$page) {
  if ( isset($page['footer_third']['devel_switch_user']) ) {
    $page['footer_third']['devel_switch_user']['devel_links']['#attributes']['class'] = array('nav', 'nav-tabs', 'nav-stacked');
    $page['footer_third']['devel_switch_user']['devel_form']['#prefix'] = '<div class="well">';
    $page['footer_third']['devel_switch_user']['devel_form']['#suffix'] = '</div>';
  }
}

/**
 * Implements hook_preprocess_html().
 */
function bootstrap_preprocess_html(&$vars) {
  $theme_path = drupal_get_path('theme', $GLOBALS['theme_key']) . '/';

  // Include Twitter Bootstrap library files, these should be placed inside your sub theme.
  if ( theme_get_setting('bootstrap_path_css') ) {
    drupal_add_css($theme_path . theme_get_setting('bootstrap_path_css'), array('group' => CSS_SYSTEM));
  }

  // Include responsive styles.
  if ( theme_get_setting('bootstrap_path_css_responsive') && theme_get_setting('bootstrap_responsive') ) {
    drupal_add_css($theme_path . theme_get_setting('bootstrap_path_css_responsive'), array('group' => CSS_SYSTEM));
  }

  if ( theme_get_setting('bootstrap_path_js') ) {
    drupal_add_js($theme_path . theme_get_setting('bootstrap_path_js'), array('group' => JS_LIBRARY));
  }

  // Navbar fixed settings.
  if ( theme_get_setting('bootstrap_navbar_fixed') ) {
    $vars['classes_array'][] = 'with-navbar';
  }

  if(empty($vars['head_title'])){// If front page, don't display a page title in head_title.
    if ( drupal_is_front_page() ) {
      $vars['head_title_array'] = array('name' => check_plain(variable_get('site_name', 'Drupal')));
      if ( variable_get('site_slogan', '') ) {
        $vars['head_title_array']['slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
      }
    }

    $vars['head_title'] = implode(' | ', $vars['head_title_array']);
  }
}
/**
 * Override or insert variables into page.tpl.php
 */
function bootstrap_preprocess_page(&$vars) {
  global $user;

  // Bootstrap Component Settings.
  $vars['navbar']                 = theme_get_setting('bootstrap_navbar');
  $vars['navbar_fixed']           = theme_get_setting('bootstrap_navbar_fixed');
  $vars['navbar_classes_array']   = array('navbar');
  $vars['subnav']                 = theme_get_setting('bootstrap_subnav');

  // Added 'navbar-fixed' class if setting is enabled.
  if ( $vars['navbar_fixed'] ) {
    $vars['navbar_classes_array'][] = 'navbar-fixed-top';
  }

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

  // Determine footer region grid sizes.
  if ( $vars['page']['footer_first'] && $vars['page']['footer_second'] ) {
    $vars['page']['footer_first']['#grid'] = 6;
    $vars['page']['footer_second']['#grid'] = 6;
  }
  elseif ( $vars['page']['footer_first'] && !$vars['page']['footer_second'] ) {
    $vars['page']['footer_first']['#grid'] = 12;
  }
  elseif ( !$vars['page']['footer_first'] && $vars['page']['footer_second'] ) {
    $vars['page']['footer_second']['#grid'] = 12;
  }
}

/**
 * Implements hook_process_page().
 */
function bootstrap_process_page(&$vars) {
  if ( isset($vars['navbar_classes_array']) ) {
    $vars['navbar_classes'] = implode(' ', $vars['navbar_classes_array']);
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
