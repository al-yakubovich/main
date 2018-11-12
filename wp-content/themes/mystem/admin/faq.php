<?php
	/**
		* FAQ
		*
		* @package WordPress
		* @subpackage MyStem
		* @since MyStem 1.0.7
	*/
?>

<script>
	jQuery(document).ready(function($) {		
		$('.item-title').children('.faq-title').click(function(){
			var par = $(this).closest('.items');
			$(par).children(".inside").toggle(500);
			if($(this).hasClass('togglehide')){
				$(this).removeClass('togglehide');
				$(this).addClass( "toggleshow" );
				$(this).attr('title', 'Show');
			}
			else {
				$(this).removeClass('toggleshow');
				$(this).addClass( "togglehide" );
				$(this).attr('title', 'Hide');
			}			
		});		
	})
</script>
<style>	
	.itembox {
		border-bottom: 1px solid;
	} 
	.faq-title{		
		cursor: pointer;				
	}	
	.faq-title:before{
		content: "\f132";
		font-family: Dashicons;
		vertical-align: bottom;
		margin-right: 8px;
		
	}	
	.toggleshow:before{
		content: "\f132";
		font-family: Dashicons;		
	}	
	.togglehide:before{
		content: "\f460";	
		font-family: Dashicons;
	}
	.item-title {
		margin: 1.25em 0 .6em;
    font-size: 1.4em;
    line-height: 1.5;
	}
	.items .inside {
		margin-bottom: 10px;
	}

</style>
<div class="items itembox">	
	<div class="item-title">
		<span class="faq-title">Add Font Awesom icon into header menu</span>		
	</div>			
	<div class="inside" style="display: none;">
		You can add a Font Awesom icon into header menu item 
		<ol>
			<li>Select Font Awesom icon on site <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">fontawesome.com</a></li>
			<li>Copy icon class, as 'fas fa-home'</li>
			<li>Insert class into item 'CSS Classes'</li>
			<li>Click 'Save Menu'</li>	
		</ol>
		
	</div>
</div>

<div class="items itembox">	
	<div class="item-title">
		<span class="faq-title">Align a single menu item to the left</span>		
	</div>			
	<div class="inside" style="display: none;">
		Add class 'left' into item 'CSS Classes'		
	</div>
</div>

<div class="items itembox">	
	<div class="item-title">
		<span class="faq-title">Page Template</span>		
	</div>			
	<div class="inside" style="display: none;">
		<ul>
			<li><strong>Full Width</strong> - the page content is displayed on the full width of the site without sidebar.</li>
			<li><strong>Full Width without Title</strong> - the page content is displayed on the full width of the site without Title and sidebar.</li>
			<li><strong>Page for Visual Composer</strong> - this template is good to use for  Visual Composer/Page Builder. With this template and the plugin Page Builder, you can create beautiful and unique pages</li>
			<li><strong>Page with Page Sidebar</strong> - create a set of the widgets in the area 'Page Sidebar' and these will display on the page with this template</li>
			<li></li>
		</ul>
	</div>
</div>