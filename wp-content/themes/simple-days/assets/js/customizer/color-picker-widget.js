( function( $ ) {
  $(document).ready(function () {
  var params = { 
    change: function(e, ui) {
      $( e.target ).val( ui.color.toString() );
      $( e.target ).trigger('change'); // enable widget "Save" button
    },
    clear: function(e, ui) {
      $( e.target ).val();
      $( e.target ).trigger('change'); // enable widget "Save" button
    },
  };

    $('#widgets-right .color-picker, .inactive-sidebar .color-picker').wpColorPicker(params);
    // Executes wpColorPicker function after AJAX is fired on saving the widget
    $(document).ajaxComplete(function() {
        $('#widgets-right .color-picker, .inactive-sidebar .color-picker').wpColorPicker(params);
    });




});
} )( jQuery );