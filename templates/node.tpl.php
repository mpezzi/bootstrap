<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>" <?php print $attributes; ?>>
  <?php print $user_picture; ?>

  <?php if ( !$page ): ?>
    <h3><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h3>
  <?php endif; ?>

  <?php if ( $display_submitted ): ?>
    <div class="submitted">
      <?php print $submitted; ?>
    </div>
  <?php endif; ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php print render($content); ?>
  </div>
</div>
