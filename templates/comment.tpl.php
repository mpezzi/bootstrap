<div class="<?php print $classes; ?> clearfix"<?php print $attributes ?>>
  <?php print $picture; ?>

  <?php if ( $title ): ?>
    <h3><?php print $title; ?></h3>
  <?php endif; ?>

  <p class="submitted">
    <?php if ( $new ): ?>
      <span class="label label-important">
        <?php print $new; ?>
      </span>
    <?php endif; ?>
    <?php if ( $status == 'comment-unpublished' ): ?>
      <span class="label label-info">
        <?php print t('Unpublished') ?>
      </span>
    <?php endif; ?>
    <small class="submitted"><?php print $submitted; ?></small>
    <small class="permalink"><?php print $permalink; ?></small>
  </p>

  <div class="content"<?php print $content_attributes ?>>
    <?php print render($content); ?>
    <?php if ( $signature ): ?>
      <div class="signature">
        <?php print $signature; ?>
      </div>
    <?php endif; ?>
  </div>

</div>
