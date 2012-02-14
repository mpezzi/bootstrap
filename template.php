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
  $vars['nav_links'] = theme('links', array(
    'links' => $vars['main_menu'],
    'attributes' => array('class' => array('nav')),
  ));

  // @TODO: Re-theme for use of parent / child menu items.
  $vars['user_links'] = theme('links', array(
    'links' => $vars['secondary_menu'],
    'attributes' => array('class' => array('dropdown-menu')),
  ));
}