<div class="navbar">
  <div class="navbar-inner">
    <div class="container">
      <?php if ( $nav_links ): ?>
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
      <?php endif; ?>
      <?php if ( $site_name ): ?>
        <a class="brand" href="<?php print $front_page; ?>">
          <?php print $site_name; ?>
        </a>
      <?php endif; ?>
      <div class="nav-collapse">
        <?php if ( $nav_links ): ?>
          <?php print $nav_links; ?>
        <?php endif; ?>
        <?php if ( $logged_in && $user_links ): ?>
          <ul class="nav pull-right">
            <li class="dropdown">
              <a href="#" class="drowdown-toggle" data-toggle="dropdown"><?php print check_plain($user->name); ?></a>
              <?php print $user_links; ?>
            </li>
          </ul>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<div class="container">

  <header class="jumbotron">
    <?php if ( $site_name ): ?>
      <h1><?php print $site_name; ?></h1>
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
          <?php print check_plain($user->name); ?>
          <span class="caret"></span>
        </a>
        <?php print $user_links; ?>
      </div>
    <?php endif; ?>
  </header>

  <?php if ( $breadcrumb ): ?>
    <?php print $breadcrumb; ?>
  <?php endif; ?>

  <?php if ( $tabs ): ?>
    <div class="tabs"><?php print render($tabs); ?></div>
  <?php endif; ?>

  <?php if ( $title ): ?>
    <div class="page-header">
      <h1><?php print $title; ?></h1>
    </div>
  <?php endif; ?>

  <?php print $messages; ?>

  <div class="row">
    <?php // @TODO: sidebar / content span calculation? ?>
    <?php if ( $page['sidebar_first'] ): ?>
      <?php print render($page['sidebar_first']); ?>
    <?php endif; ?>

    <?php print render($page['content']); ?>

    <?php if ( $page['sidebar_second'] ): ?>
      <?php print render($page['sidebar_second']); ?>
    <?php endif; ?>
  </div>

</div>

<footer class="container">
  <?php print render($page['footer']); ?>
</footer>
