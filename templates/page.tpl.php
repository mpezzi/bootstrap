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
    <?php if ( $site_name ): ?>
      <h1><a href="<?php print $front_page; ?>"><?php print $site_name; ?></a></h1>
    <?php endif; ?>
    <?php if ( $site_slogan ): ?>
      <p class="lead"><?php print $site_slogan; ?></p>
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
