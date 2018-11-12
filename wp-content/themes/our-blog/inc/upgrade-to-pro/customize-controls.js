/**
 * Customizer custom js
 */

jQuery(document).ready(function() {
   jQuery('.wp-full-overlay-sidebar-content').prepend('<div class="our-blog-ads"> <a href="https://justwpthemes.com/downloads/our-blog-pro/" class="button" target="_blank">{pro}</a></div>'.replace('{pro}',our_blog_customizer_js_obj.pro));
});