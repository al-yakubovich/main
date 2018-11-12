<?php
/**
 * Define custom fields for widgets
 * 
 * @package Our_Blog
 * @since 1.0.0
 */

function our_blog_widgets_show_widget_field( $instance = '', $widget_field = '', $mt_widget_field_value = '' ) {

    extract( $widget_field );

    switch ( $our_blog_widgets_field_type ) {

        /**
         * text field
         */
        case 'text' :
        ?>
        <p>
            <label for="<?php echo esc_attr( $instance->get_field_id( $our_blog_widgets_name ) ); ?>"><?php echo esc_html( $our_blog_widgets_title ); ?>:</label>
            <input class="widefat" id="<?php echo esc_attr( $instance->get_field_id( $our_blog_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $our_blog_widgets_name ) ); ?>" type="text" value="<?php echo esc_html( $mt_widget_field_value ); ?>" />

            <?php if ( isset( $our_blog_widgets_description ) ) { ?>
                <br />
                <small><em><?php echo esc_html( $our_blog_widgets_description ); ?></em></small>
            <?php } ?>
        </p>
        <?php
        break;

        /**
         * number field
         */
        case 'number' :
        ?>
        <p>
            <label for="<?php echo esc_attr( $instance->get_field_id( $our_blog_widgets_name ) ); ?>"><?php echo esc_html( $our_blog_widgets_title ); ?>:</label>
            <input name="<?php echo esc_attr( $instance->get_field_name( $our_blog_widgets_name ) ); ?>" type="number" step="1" min="1" id="<?php echo esc_attr( $instance->get_field_id( $our_blog_widgets_name ) ); ?>" value="<?php echo esc_html( $mt_widget_field_value ); ?>" class="small-text" />

            <?php if ( isset( $our_blog_widgets_description ) ) { ?>
                <br />
                <small><?php echo esc_html( $our_blog_widgets_description ); ?></small>
            <?php } ?>
        </p>
        <?php
        break;

        /**
         * checkbox
         */
        case 'checkbox' :
        ?>
        <p>
            <input id="<?php echo esc_attr( $instance->get_field_id( $our_blog_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $our_blog_widgets_name ) ); ?>" type="checkbox" value="1" <?php checked( '1', $mt_widget_field_value ); ?>/>
            <label for="<?php echo esc_attr( $instance->get_field_id( $our_blog_widgets_name ) ); ?>"><?php echo esc_html( $our_blog_widgets_title ); ?></label>

            <?php if ( isset( $our_blog_widgets_description ) ) { ?>
                <br />
                <em><?php echo wp_kses_post( $our_blog_widgets_description ); ?></em>
            <?php } ?>
        </p>
        <?php
        break;

        /**
         * url field
         */
        case 'url' :
        ?>
        <p>
            <label for="<?php echo esc_attr( $instance->get_field_id( $our_blog_widgets_name ) ); ?>"><?php echo esc_html( $our_blog_widgets_title ); ?>:</label>
            <input class="widefat" id="<?php echo esc_attr( $instance->get_field_id( $our_blog_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $our_blog_widgets_name ) ); ?>" type="text" value="<?php echo esc_url( $mt_widget_field_value ); ?>" />

            <?php if ( isset( $our_blog_widgets_description ) ) { ?>
                <br />
                <small><?php echo esc_html( $our_blog_widgets_description ); ?></small>
            <?php } ?>
        </p>
        <?php
        break;

        /**
         * textarea field
         */
        case 'textarea' :
        ?>
        <p>
            <label for="<?php echo esc_attr( $instance->get_field_id( $our_blog_widgets_name ) ); ?>"><?php echo esc_html( $our_blog_widgets_title ); ?>:</label>
            <textarea class="widefat" rows="<?php echo intval( $our_blog_widgets_row ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $our_blog_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $our_blog_widgets_name ) ); ?>"><?php echo esc_html( $mt_widget_field_value ); ?></textarea>
        </p>
        <?php
        break;

        /**
         * select field
         */
        case 'select' :
        ?>
        <p>
            <label for="<?php echo esc_attr( $instance->get_field_id( $our_blog_widgets_name ) ); ?>"><?php echo esc_html( $our_blog_widgets_title ); ?>:</label>
            <select name="<?php echo esc_attr( $instance->get_field_name( $our_blog_widgets_name ) ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $our_blog_widgets_name ) ); ?>" class="widefat">
                <?php foreach ( $our_blog_widgets_field_options as $select_option_name => $select_option_title ) { ?>
                    <option value="<?php echo esc_attr( $select_option_name ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $select_option_name ) ); ?>" <?php selected( $select_option_name, $mt_widget_field_value ); ?>><?php echo esc_html( $select_option_title ); ?></option>
                <?php } ?>
            </select>

            <?php if ( isset( $our_blog_widgets_description ) ) { ?>
                <br />
                <small><?php echo esc_html( $our_blog_widgets_description ); ?></small>
            <?php } ?>
        </p>
        <?php
        break;
        
        /**
        * Dropdown Pages
        */
        case 'dropdown_pages' :
        $select_field = 'name="'. esc_attr( $instance->get_field_name( $our_blog_widgets_name ) ) .'" id="'. esc_attr( $instance->get_field_id( $our_blog_widgets_name ) ) .'" class="widefat"';
        ?>
        <p>
            <label for="<?php echo esc_attr( $instance->get_field_id( $our_blog_widgets_name ) ); ?>"><?php echo esc_html( $our_blog_widgets_title ); ?>:</label>
            <?php
            $dropdown_args = wp_parse_args( array(
                'show_option_none'  => __( '- - Select Page - -', 'our-blog' ),
                'selected'          => esc_attr( $mt_widget_field_value ),
                'child_of'          => 0,
                'depth'             => 0,
                'option_none_value' => 0,
                'value_field'       => 'id',
            ) );
            $dropdown_args['echo'] = false;
            $dropdown = wp_dropdown_pages( $dropdown_args );
            $dropdown = str_replace( '<select', '<select ' . $select_field, $dropdown );
            echo $dropdown;
            ?>
        </p>
        
        <?php
        break;
        
    }
}

function our_blog_widgets_updated_field_value( $widget_field, $new_field_value ) {

    extract( $widget_field );

    if ( $our_blog_widgets_field_type == 'number') {
        return absint( $new_field_value );
    } elseif ( $our_blog_widgets_field_type == 'textarea' ) {
        return wp_kses_post( $new_field_value );
    } elseif ( $our_blog_widgets_field_type == 'url' ) {
        return esc_url_raw( $new_field_value );
    } elseif( $our_blog_widgets_field_type == 'multicheckboxes' ) {
        return wp_kses_post( $new_field_value );
    } else {
        return sanitize_text_field( $new_field_value );
    }
}