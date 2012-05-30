<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Bootstrap:
 * - $navbar: TRUE if the navbar setting is enabled.
 * - $navbar_fixed: TRUE if the navbar fixed setting is enabled.
 * - $navbar_primary_links: Primary navigation rendered from theme_links.
 * - $navbar_secondary_links: Secondary navigation rendered from theme_links.
 * - $navbar_classes: A string of navbar classes.
 * - $navbar_classes_array (array): An array containing navbar classes.
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 */
?>
<?php if ( $navbar ): ?>
<div class="<?php print $navbar_classes; ?>">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="<?php print $front_page; ?>"><?php print $site_name; ?></a>
      <div class="nav-collapse">
        <?php print $navbar_primary_links; ?>
        <?php print $navbar_secondary_links; ?>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<div class="container">

  <header id="header" class="jumbotron">

    <?php if ( $logo ): ?>
      <a id="site-logo" href="<?php print $front_page; ?>" title="<?php print $site_name; ?>" rel="home">
        <img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" />
      </a>
    <?php endif; ?>

    <?php if ( $site_name ): ?>
      <h1 id="site-name">
        <a href="<?php print $front_page; ?>"><?php print $site_name; ?></a>
      </h1>
    <?php endif; ?>

    <?php if ( $site_slogan ): ?>
      <p id="site-slogan" class="lead">
        <?php print $site_slogan; ?>
      </p>
    <?php endif; ?>

    <?php if ( $subnav_links ): ?>
      <div class="subnav">
        <?php print $subnav_links; ?>
      </div>
    <?php endif; ?>

    <?php if ( $logged_in && $user_links ): ?>
      <div class="btn-group user-links">
        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
          <?php print $user_links_authenticated_text; ?>
          <span class="caret"></span>
        </a>
        <?php print $user_links; ?>
      </div>
    <?php endif; ?>

    <?php if ( !$logged_in ): ?>
      <div class="btn-group user-links">
        <a class="btn" href="<?php print url($user_links_anonymous_link); ?>">
          <?php print $user_links_anonymous_text; ?>
        </a>
      </div>
    <?php endif; ?>

  </header>

  <?php if ( $breadcrumb ): ?>
    <?php print $breadcrumb; ?>
  <?php endif; ?>

  <?php if ( !empty($tabs['#primary']) ): ?>
    <div class="tabs"><?php print render($tabs); ?></div>
  <?php endif; ?>

  <?php if ( $title ): ?>
    <div id="page-title" class="page-header">
      <?php print render($title_prefix); ?>
      <h1><?php print $title; ?></h1>
      <?php print render($title_suffix); ?>
      <?php if ( $action_links ): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <?php print $messages; ?>

  <?php print render($page['content_top']); ?>

  <div class="row">
    <?php if ( $page['sidebar_first'] ): ?>
      <?php print render($page['sidebar_first']); ?>
    <?php endif; ?>

    <?php print render($page['content']); ?>

    <?php if ( $page['sidebar_second'] ): ?>
      <?php print render($page['sidebar_second']); ?>
    <?php endif; ?>
  </div>

  <?php print render($page['content_bottom']); ?>

</div>

<footer id="footer" class="container">
  <?php if ( $page['footer_first'] || $page['footer_second'] ): ?>
    <div class="row">
      <?php if ( $page['footer_first']): ?>
        <?php print render($page['footer_first']); ?>
      <?php endif; ?>
      <?php if ( $page['footer_second']): ?>
        <?php print render($page['footer_second']); ?>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <?php if ( $page['footer_third']): ?>
    <?php print render($page['footer_third']); ?>
  <?php endif; ?>
</footer>
