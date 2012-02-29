#Bootstrap

----------

**Bootstrap** is a Drupal parent theme based of off [Twitter Bootstrap](http://twitter.github.com/bootstrap)

Required libraries:

* [Twitter Bootstrap](http://twitter.github.com/bootstrap)

Notes:

* Extract the contents of http://twitter.github.com/bootstrap/assets/bootstrap.zip into this theme.
* Bootstrap.js requires jQuery 1.7, it is loaded in noConflict mode in html.tpl.php and you will need to prepend "window.jQuery = $jq171;" to the bootstrap/js/bootstrap.js file you downloaded.

Todos:

* Sidebar Left / Sidebar Right / Content Regions layout aren't setup yet.
* Find a better approach for integrating jQuery 1.7.1