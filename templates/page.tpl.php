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
 * - $navbar: TRUE if the navbar theme setting is enabled.
 * - $navbar_fixed: TRUE if the navbar fixed setting is enabled.
 * - $navbar_classes: A string of navbar classes.
 * - $navbar_classes_array (array): An array containing navbar classes.
 * - $subnav: TRUE if the subnav theme setting is enabled.
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
<div class="<?php print $navbar_classes; ?>" role="navigation">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <?php if ( $site_name ): ?>
        <a class="brand" href="<?php print $front_page; ?>">
          <?php print $site_name; ?>
        </a>
      <?php endif; ?>
      <div class="nav-collapse">
        <?php print theme('links', array(
          'links' => $main_menu,
          'attributes' => array('class' => array('nav')),
        )); ?>
        <?php print theme('links', array(
          'links' => $secondary_menu,
          'attributes' => array('class' => array('nav', 'pull-right')),
        )); ?>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<div class="container">

  <header id="header" class="jumbotron clearfix" role="banner">

    <?php if ( $logo ): ?>
      <a id="site-logo" href="<?php print $front_page; ?>" title="<?php print $site_name; ?>" rel="home">
        <img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" />
      </a>
    <?php endif; ?>

    <?php if ( $site_name || $site_slogan ): ?>
      <hgroup id="name-and-slogan">
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
      </hgroup>
    <?php endif; ?>

    <?php if ( $subnav ): ?>
      <div class="subnav" role="navigation">
        <?php print theme('links', array(
          'links' => $main_menu,
          'attributes' => array('class' => array('nav', 'nav-pills')),
        )); ?>
      </div>
    <?php endif; ?>

    <?php print render($page['header_first']); ?>
    <?php print render($page['header_second']); ?>

  </header> <!-- / #header -->

  <?php if ( $page['navigation'] ): ?>
    <?php print render($page['navigation']); ?>
  <?php endif; ?>

  <?php if ( $breadcrumb ): ?>
    <?php print $breadcrumb; ?>
  <?php endif; ?>

  <?php if ( !empty($tabs['#primary']) ): ?>
    <div class="tabs"><?php print render($tabs); ?></div>
  <?php endif; ?>

  <div id="content">

    <?php print render($title_prefix); ?>
    <?php if ( $title ): ?>
      <div id="page-title" class="page-header clearfix">
        <h1 id="title"><?php print $title; ?></h1>
        <?php if ( $page['title'] ): ?>
          <?php print render($page['title']); ?>
        <?php endif; ?>
      </div> <!-- / #page-title -->
    <?php endif; ?>
    <?php print render($title_suffix); ?>

    <?php if ( $action_links ): ?>
      <ul class="action-links">
        <?php print render($action_links); ?>
      </ul>
    <?php endif; ?>

    <?php print $messages; ?>

    <?php print render($page['content_top']); ?>
    <?php print render($page['help']); ?>

    <div id="main" class="row">
      <?php if ( $page['sidebar_first'] ): ?>
        <?php print render($page['sidebar_first']); ?>
      <?php endif; ?>

      <?php print render($page['content']); ?>

      <?php if ( $page['sidebar_second'] ): ?>
        <?php print render($page['sidebar_second']); ?>
      <?php endif; ?>
    </div> <!-- / #main -->

    <?php print render($page['content_bottom']); ?>
    <?php print $feed_icons; ?>

  </div> <!-- / #content -->

</div> <!-- / #container -->

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
</footer> <!-- / #footer -->
