
jQuery(document).ready( function($) {
  var params = { 
    change: function(e, ui) {
      $( e.target ).val( ui.color.toString() );
      $( e.target ).trigger('change'); // enable widget "Save" button
    },
    clear: function(e, ui) {
      $( e.target ).val();
      $( e.target ).trigger('change'); // enable widget "Save" button
    },
  }

  $(this).ajaxComplete( function() {
    $('.color-picker').wpColorPicker( params );
  });

  function onFormUpdate(event, widget) {
    $('.color-picker').wpColorPicker( params );
  }

  $(document).on('widget-added widget-updated', onFormUpdate );

  $('.color-picker').wpColorPicker( params );

})

(function($) {
  $(function() {
    var options = {
      defaultColor: false,
      change: function(event, ui){},
      clear: function() {},
      hide: true,
      palettes: true
    };
    $('.color-picker').wpColorPicker(options);
  });
})(jQuery);