<?php 
/**
 * Sanitize checkbox field
 *
 *  @since Gist 1.0.0
 */
if (!function_exists('gist_sanitize_checkbox')) :
    function gist_sanitize_checkbox($checked)
    {
        // Boolean check.
        return ((isset($checked) && true == $checked) ? true : false);
    }
endif;

/**
 * Sanitize selection
 *
 *  @since Gist 1.0.0
 */
if (!function_exists('gist_sanitize_select')) :
    function gist_sanitize_select($input, $setting)
    {
        // Ensure input is a slug.
        $input = sanitize_key($input);
        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control($setting->id)->choices;
        // If the input is a valid key, return it; otherwise, return the default.
        return (array_key_exists($input, $choices) ? $input : $setting->default);
    }
endif;

/**
 * Adds sanitization callback function: Number
 *  @since Gist 1.0.0
 */
if (!function_exists('gist_sanitize_number')) :
    function gist_sanitize_number($input)
    {
        if (isset($input) && is_numeric($input)) {
            return $input;
        }
    }
endif;
