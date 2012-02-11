(function($){
  $(function(){
    if ( $('body.toolbar .navbar-fixed-top').length > 0 ) {
      $('body').css('padding-top', '105px');
    }

    if ( $('body.toolbar-drawer .navbar-fixed-top').length > 0 ) {
      $('body').css('padding-top', '105px');
    }

    $('.collapse').collapse();
    $('.alert-message').alert();

  });
})($jq171);