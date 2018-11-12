wp.customize.controlConstructor['mystem-icon-picker'] = wp.customize.Control.extend({
	
	ready: function() {
		'use strict';
		
		var control = this,
		element = control.id;	
		
		jQuery( '#' + element ).fontIconPicker({
			theme: 'fip-darkgrey',
			emptyIcon: true,
			allCategoryText: 'Show all',
		
		});		
		
		
		jQuery( '.icons-selector' ).on( 'click', function() {
			var value = jQuery( this ).find( '.selected-icon i' ).attr('class');			
			control.setting.set( value );
		});
		
	}
	
});
