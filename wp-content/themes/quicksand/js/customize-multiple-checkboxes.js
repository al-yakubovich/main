/**
 * Checkbox Multiple Control
 * 
 * Multiple checkbox as a group handled
 *
 * @see     http://justintadlock.com/archives/2015/05/26/multiple-checkbox-customizer-control 
 */


// a normal 'jQuery(document).ready()' doesn't work, because there are to many controls 
// wait until load is ready
jQuery(document).on('load ready', function () {
    jQuery('.customize-control-checkbox-multiple input[type="checkbox"]').on('change', function () {

        var checkbox_values = jQuery(this).parents('.customize-control').find('input[type="checkbox"]:checked').map(
                function () {
                    return this.value;
                }
        ).get().join(',');

        jQuery(this).parents('.customize-control').find('input[type="hidden"]').val(checkbox_values).trigger('change');
    });


}); 