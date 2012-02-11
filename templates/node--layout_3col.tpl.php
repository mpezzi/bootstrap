<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>" <?php print $attributes; ?>>
  <div class="row">
    <div class="span4">
      <?php print render($content['field_col1']); ?>
    </div>
    <div class="span4">
      <?php print render($content['field_col2']); ?>
    </div>
    <div class="span4">
      <?php print render($content['field_col3']); ?>
    </div>
  </div>
</div>
