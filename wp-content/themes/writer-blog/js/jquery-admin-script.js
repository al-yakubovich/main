( function( $ ){
    $( document ).ready( function(){
      $( '.select-img' ).live( 'click', function( e ){
          e.preventDefault();
          var image_uploader = wp.media( {
            'title' :  'Upload author image',
          } );
          image_uploader.open();
          
          var button  = $( this );
          
          image_uploader.on( 'select', function(){

            var image = image_uploader.state().get( "selection" ).first().toJSON();
            var image_link = image.url;

            button.next( '.author-img' ).val( image_link );
            button.parent().find( '.widget_author_image img' ).attr( 'src', image_link );
          } );
      } );
    } );
}( jQuery ) )