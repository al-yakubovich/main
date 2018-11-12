<?php

/**
 * This file belongs to the TIP Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if( !class_exists( 'suevafree_admin_notice' ) ) {

	class suevafree_admin_notice {
	
		/**
		 * Constructor
		 */
		 
		public function __construct( $fields = array() ) {

			if ( !get_user_meta( get_current_user_id(), 'SuevaFree_AdminID_Notice_' . get_current_user_id() , TRUE ) ) {

				add_action( 'admin_notices', array(&$this, 'admin_notice') );
				add_action( 'admin_head', array( $this, 'dismiss' ) );
			
			}

			add_action( 'switch_theme', array( $this, 'update_dismiss' ) );

		}

		/**
		 * Update notice.
		 */

		public function update_dismiss() {
			delete_metadata( 'user', null, 'SuevaFree_AdminID_Notice_' . get_current_user_id(), null, true );
		}

		/**
		 * Dismiss notice.
		 */
		
		public function dismiss() {
		
			if ( isset( $_GET['sueva-free-dismiss'] ) ) {
		
				update_user_meta( get_current_user_id(), 'SuevaFree_AdminID_Notice_' . get_current_user_id() , intval($_GET['sueva-free-dismiss']) );
				remove_action( 'admin_notices', array(&$this, 'admin_notice') );
				
			} 
		
		}

		/**
		 * Admin notice.
		 */
		 
		public function admin_notice() {
			
		?>
			
            <div class="update-nag notice suevafree-notice">
            
            	<div class="suevafree-noticedescription">
					<strong><?php esc_html_e( 'Upgrade to the premium version of Sueva, to enable 600+ Google Fonts, Unlimited sidebars, Portfolio section and much more.', 'suevafree' ); ?></strong><br/>
					<?php printf( '<a href="%1$s" class="dismiss-notice">'. __( 'Dismiss this notice', 'suevafree' ) .'</a>', esc_url( '?sueva-free-dismiss=1' ) ); ?>
                </div>
                
                <a target="_blank" href="<?php echo esc_url( 'https://www.themeinprogress.com/sueva/?ref=2&campaign=sueva-notice' ); ?>" class="button"><?php esc_html_e( 'Upgrade to Sueva Premium', 'suevafree' ); ?></a>
                <div class="clear"></div>

            </div>
		
		<?php
		
		}

	}

}

new suevafree_admin_notice();

?>