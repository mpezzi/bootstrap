#Bootstrap

----------

**Bootstrap** is a Drupal parent theme based of off [Twitter Bootstrap](http://twitter.github.com/bootstrap)

Required libraries:

* [Twitter Bootstrap](http://twitter.github.com/bootstrap)

Required modules:

* [jQuery Update 7.x-2.x-dev](http://drupal.org/project/jquery_update)

Notes:

* Extract the contents of http://twitter.github.com/bootstrap/assets/bootstrap.zip into this theme.
* Bootstrap.js requires jQuery 1.7 +, download and enable the dev version of jQuery Update and set the version to 1.7 on the jQuery Update settings page (admin/config/development/jquery_update). Alternatively, if you find 1.7 breaks your administration pages, you can use the following code in your settings.php file to switch between jQuery versions.

<pre>
if ( arg(0) == 'admin' ) {
  $conf['jquery_update_jquery_version'] = '1.5';
}
else {
  $conf['jquery_update_jquery_version'] = '1.7';
}
</pre>
