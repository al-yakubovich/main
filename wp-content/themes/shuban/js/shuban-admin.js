jQuery(document).ready(function($) {

    "use strict";

    // Start by hiding the all post format meta box
    $( "#video-post-metabox, #audio-post-metabox, #gallery-post-metabox, #status-post-metabox" ).addClass( "hidden" );

    if( $( "input#post-format-video" ).is(':checked') ){
        $( "#video-post-metabox" ).removeClass( "hidden" );
    }
    // If "Video" post format is selected, show the "Video Options" meta box
    $( "input#post-format-video" ).change( function() {
        if( $(this).is(':checked') ){
            $( "#video-post-metabox, #audio-post-metabox, #gallery-post-metabox, #status-post-metabox" ).addClass( "hidden" );
            $( "#video-post-metabox" ).removeClass( "hidden" );
        }
    } );


    if( $( "input#post-format-audio" ).is(':checked') ){
        $( "#audio-post-metabox" ).removeClass( "hidden" );
    }
    // If "Audio" post format is selected, show the "Audio Options" meta box
    $( "input#post-format-audio" ).change( function() {
        if( $(this).is(':checked') ){
            $( "#audio-post-metabox, #video-post-metabox, #gallery-post-metabox, #status-post-metabox" ).addClass( "hidden" );
            $( "#audio-post-metabox" ).removeClass( "hidden" );
        }
    } );


    if( $( "input#post-format-gallery" ).is(':checked') ){
        $( "#gallery-post-metabox" ).removeClass( "hidden" );
    }
    // If "Audio" post format is selected, show the "Audio Options" meta box
    $( "input#post-format-gallery" ).change( function() {
        if( $(this).is(':checked') ){
            $( "#audio-post-metabox, #video-post-metabox, #gallery-post-metabox, #status-post-metabox" ).addClass( "hidden" );
            $( "#gallery-post-metabox" ).removeClass( "hidden" );
        }
    } );


    if( $( "input#post-format-status" ).is(':checked') ){
        $( "#status-post-metabox" ).removeClass( "hidden" );
    }
    // If "Status" post format is selected, show the "Audio Options" meta box
    $( "input#post-format-status" ).change( function() {
        if( $(this).is(':checked') ){
            $( "#audio-post-metabox, #video-post-metabox, #gallery-post-metabox, #status-post-metabox" ).addClass( "hidden" );
            $( "#status-post-metabox" ).removeClass( "hidden" );
        }
    } );


    // If "Standard" post format is selected, hide all metaboxes for post formats
    $( "input#post-format-0" ).change( function() {
        if( $(this).is(':checked') ){
            $( "#video-post-metabox, #audio-post-metabox, #status-post-metabox" ).addClass( "hidden" );
        }
    } );

});
