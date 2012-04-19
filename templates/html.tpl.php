<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>
<body id="top" class="<?php print $classes; ?>" <?php print $attributes; ?>>
  <div id="page">
    <?php print $page_top; ?>
    <?php print $page; ?>
    <?php print $page_bottom; ?>
  </div>
</body>
</html>
