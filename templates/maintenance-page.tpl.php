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
<body class="<?php print $classes; ?>" <?php print $attributes; ?>>
  <div id="page">
    <div class="container well">
      <h1><?php print $site_name; ?></h1>
      <p><?php print $content; ?></p>
    </div>
  </div>
</body>
</html>
