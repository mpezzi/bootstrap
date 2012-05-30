<?php

/**
 * @file
 * Contains functions only needed for drush integration (code borrowed from Zen and Colorbox projects)
 */

/**
 * The Twitter Bootstrap Source URI.
 */
define('BOOTSTRAP_DOWNLOAD_URI', 'http://twitter.github.com/bootstrap/assets/bootstrap.zip');

/**
 * Implementation of hook_drush_command().
 */
function bootstrap_drush_command() {
  $items = array();

  $items['bootstrap-subtheme'] = array(
    'description' => 'Create a theme using Bootstrap.',
    'arguments' => array(
      'name'         => 'A name for your theme.',
      'machine_name' => '[optional] A machine-readable name for your theme.',
    ),
    'options' => array(
      'name'         => 'A name for your theme.',
      'machine-name' => '[a-z, 0-9] A machine-readable name for your theme.',
      'description'  => 'A description of your theme.',
      // @TODO: Add these options:
      // 'responsive' => 'Enable responsive scaffolding.',
    ),
    'examples' => array(
      'drush bootstrap "My theme name"' => 'Create a sub-theme, using the default options.',
      'drush bootstrap "My theme name" my_theme' => 'Create a sub-theme with a specific machine name.',
    ),
  );

  return $items;
}

/**
 * Create a Bootstrap sub-theme using the starter kit.
 */
function drush_bootstrap_subtheme($name = NULL, $machine_name = NULL) {
  // Determine the theme name.
  if (!isset($name)) {
    $name = drush_get_option('name');
  }

  // Determine the machine name.
  if (!isset($machine_name)) {
    $machine_name = drush_get_option('machine-name');
  }
  if (!$machine_name) {
    $machine_name = $name;
  }
  $machine_name = str_replace(' ', '_', strtolower($machine_name));
  $search = array(
    '/[^a-z0-9_]/', // Remove characters not valid in function names.
    '/^[^a-z]+/',   // Functions must begin with an alpha character.
  );
  $machine_name = preg_replace($search, '', $machine_name);

  // Determine the path to the new subtheme by finding the path to Zen.
  $bootstrap_path = drush_locate_root() . '/' . drupal_get_path('theme', 'bootstrap');
  $subtheme_path = explode('/', $bootstrap_path);
  array_pop($subtheme_path);
  $subtheme_path = implode('/', $subtheme_path) . '/' . str_replace('-', '_', $machine_name);

  // Make a fresh copy of the original starter kit.
  drush_op('bootstrap_copy', $bootstrap_path . '/starterkits/starterkit_bootstrap', $subtheme_path);

  // Rename the .info file.
  $subtheme_info_file = $subtheme_path . '/' . $machine_name . '.info';
  drush_op('rename', $subtheme_path . '/starterkit_bootstrap.info.txt', $subtheme_info_file);

  // Alter the contents of the .info file based on the command options.
  $alterations = array(
    '= Bootstrap Starter Kit' => '= ' . $name,
  );
  if ($description = drush_get_option('description')) {
    $alterations['Bootstrap Starter Kit'] = $description;
  }
  drush_op('bootstrap_file_str_replace', $subtheme_info_file, array_keys($alterations), $alterations);

  // Replace all occurrences of 'STARTERKIT' with the machine name of our sub theme.
  drush_op('bootstrap_file_str_replace', $subtheme_path . '/theme-settings.php', 'starterkit_bootstrap', $machine_name);
  drush_op('bootstrap_file_str_replace', $subtheme_path . '/template.php', 'starterkit_bootstrap', $machine_name);

  // Download zip archive.
  if ( !drush_shell_exec('type unzip') ) {
    return drush_print(dt('Missing dependency: unzip. Install it before using this command.'), 'error');
  }

  // Set the directory to the download location.
  $olddir = getcwd();
  chdir($subtheme_path);

  $filename = basename(BOOTSTRAP_DOWNLOAD_URI);
  $dirname = basename(BOOTSTRAP_DOWNLOAD_URI, '.zip');

  // Download the zip archive
  if ( !drush_shell_exec('wget' . BOOTSTRAP_DOWNLOAD_URI) ) {
    drush_shell_exec('curl -O ' . BOOTSTRAP_DOWNLOAD_URI);
  }

  // Extract the zip archive and delete .zip file.
  if ( is_file($filename) ) {
    drush_shell_exec('unzip -qq -o ' . $filename);
    drush_op('unlink', $filename);
  }

  // Set working directory back to the previous working directory.
  chdir($olddir);

  if ( is_dir($subtheme_path .'/'. $dirname) ) {
    drush_log(dt('Twitter Bootstrap was successfully downloaded and extracted to @path', array('@path' => $subtheme_path)), 'success');
  }
  else {
    drush_log(dt('Drush was unable to download the Twitter Bootstrap library to @path', array('@path' => $subtheme_path)), 'error');
  }

  // Notify user of the newly created theme.
  drush_print(dt('Starter kit for "!name" created in: !path', array(
    '!name' => $name,
    '!path' => $subtheme_path,
  )));
}

/**
 * Copy a directory recursively.
 */
function bootstrap_copy($source_dir, $target_dir, $ignore = '/^(\.(\.)?|CVS|\.svn|\.git|\.DS_Store)$/') {
  if (!is_dir($source_dir)) {
    drush_die(dt('The directory "!directory" was not found.', array('!directory' => $source_dir)));
  }
  $dir = opendir($source_dir);
  @mkdir($target_dir);
  while($file = readdir($dir)) {
    if (!preg_match($ignore, $file)) {
      if (is_dir($source_dir . '/' . $file)) {
        bootstrap_copy($source_dir . '/' . $file, $target_dir . '/' . $file, $ignore);
      }
      else {
        copy($source_dir . '/' . $file, $target_dir . '/' . $file);
      }
    }
  }
  closedir($dir);
}

/**
 * Replace strings in a file.
 */
function bootstrap_file_str_replace($file_path, $find, $replace) {
  $file_contents = file_get_contents($file_path);
  $file_contents = str_replace($find, $replace, $file_contents);
  file_put_contents($file_path, $file_contents);
}
