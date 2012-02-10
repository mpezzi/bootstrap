<div class="container">
  <?php if ( $breadcrumb ): ?>
    <?php print $breadcrumb; ?>
  <?php endif; ?>

  <?php print $messages; ?>

  <?php if ( $title ): ?>
    <div class="page-header">
      <h1><?php print $title; ?></h1>
    </div>
  <?php endif; ?>

  <?php if ( $tabs ): ?>
    <div class="tabs"><?php print render($tabs); ?></div>
  <?php endif; ?>

  <div class="row">
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
