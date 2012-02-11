<div id="comments" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php if ( $content['comments'] && $node->type != 'forum' ): ?>
    <div class="page-header">
      <h2 class="title"><?php print t('Comments'); ?></h2>
    </div>
  <?php endif; ?>

  <?php print render($content['comments']); ?>

  <?php if ( $content['comment_form'] ): ?>
    <div class="page-header">
      <h2 class="title comment-form"><?php print t('Add new comment'); ?></h2>
    </div>
    <?php print render($content['comment_form']); ?>
  <?php endif; ?>
</div>
