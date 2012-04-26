<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <div class="modal hide fade in" id="devel-switch-user">
    <div class="modal-header">
      <button class="close" data-dismiss="modal">x</button>
      <?php if ($block->subject): ?>
        <h3<?php print $title_attributes; ?>><?php print $block->subject ?></h3>
      <?php endif;?>
    </div>

    <div class="modal-body content"<?php print $content_attributes; ?>>
      <?php print $content ?>
    </div>
  </div>

  <div class="content">
    <a class="btn" data-toggle="modal" href="#devel-switch-user"><?php print t('Switch User'); ?></a>
  </div>
</div>

