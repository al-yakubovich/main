<?php
/**
 * Meta fields for category design improvements.
 * Version: 0.1
 * License: GPLv2
 *
 * @package loose
 */

if ( ! class_exists( 'Loose_Meta_For_Categories' ) ) {

/**
 * Class for managing extra metadata for categories.
 */
class Loose_Meta_For_Categories {

		/**
		 * Class constructor.
		 */
		public function __construct() {

				add_action( 'init', array( $this, 'register_meta' ) );
				add_action( 'category_add_form_fields', array( $this, 'new_term_bg_color_field' ) );
				add_action( 'category_edit_form_fields', array( $this, 'edit_term_bg_color_field' ) );
				add_action( 'category_add_form_fields', array( $this, 'new_term_text_color_field' ) );
				add_action( 'category_edit_form_fields', array( $this, 'edit_term_text_color_field' ) );
				add_action( 'category_add_form_fields', array( $this, 'new_term_image_field' ) );
				add_action( 'category_edit_form_fields', array( $this, 'edit_term_image_field' ) );
				add_action( 'edit_category', array( $this, 'save_term_bg_color' ) );
				add_action( 'create_category', array( $this, 'save_term_bg_color' ) );
				add_action( 'edit_category', array( $this, 'save_term_text_color' ) );
				add_action( 'create_category', array( $this, 'save_term_text_color' ) );
				add_action( 'edit_category', array( $this, 'save_term_image' ) );
				add_action( 'create_category', array( $this, 'save_term_image' ) );
				add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
			}

		/**
		 * Registering meta keys.
		 */
		public function register_meta() {

				register_meta( 'term', 'bg_color', 'sanitize_hex_color_no_hash' );
				register_meta( 'term', 'text_color', 'sanitize_hex_color_no_hash' );
				register_meta( 'term', 'image', 'absint' );
			}

		/**
		 * Geting background category color.
		 *
		 * @param type $term_id taxonomy term.
		 * @param type $hash before hex color.
		 * @return type
		 */
		public function get_term_bg_color( $term_id, $hash = false ) {

				$color = get_term_meta( $term_id, 'bg_color', true );
				$color = sanitize_hex_color_no_hash( $color );

				return $hash && $color ? "#{$color}" : $color;
			}

				/**
				 * Geting category text color.
				 *
				 * @param type $term_id taxonomy term.
				 * @param type $hash before hex color.
				 * @return type
				 */
		public function get_term_text_color( $term_id, $hash = false ) {

				$color = get_term_meta( $term_id, 'text_color', true );
				$color = sanitize_hex_color_no_hash( $color );

				return $hash && $color ? "#{$color}" : $color;
			}

		/**
		 * Geting category image.
		 *
		 * @param type $term_id taxonomy term.
		 * @return type
		 */
		public function get_term_image( $term_id ) {

				$imageid = get_term_meta( $term_id, 'image', true );

				return $imageid;
			}

		/**
		 * New term screen background color field.
		 */
		public function new_term_bg_color_field() {

				wp_nonce_field( basename( __FILE__ ), 'mfc_term_bg_color_nonce' ); ?>

				<div class="form-field mfc-term-bg-color-wrap">
					<label for="mfc-term-bg-color"><?php esc_html_e( 'Background Color', 'loose' ); ?></label>
					<input type="text" name="mfc_term_bg_color" id="mfc-term-bg-color" value="" class="mfc-bg-color-field" data-default-color="#fff" />
				</div>
		<?php
		}

				/**
				 * New term screen text color field.
				 */
		public function new_term_text_color_field() {

				wp_nonce_field( basename( __FILE__ ), 'mfc_term_text_color_nonce' );
				?>

				<div class="form-field mfc-term-text-color-wrap">
					<label for="mfc-term-text-color"><?php esc_html_e( 'Text Color', 'loose' ); ?></label>
					<input type="text" name="mfc_term_text_color" id="mfc-term-text-color" value="" class="mfc-text-color-field" data-default-color="#000" />
				</div>
		<?php
		}

		/**
		 * Edit term screen bg color field.
		 *
		 * @param type $term taxonomy term.
		 */
		public function edit_term_bg_color_field( $term ) {

				$default = '#ffffff';
				$color   = $this->get_term_bg_color( $term->term_id, true );

				if ( ! $color ) {
				$color = $default; }
				?>

				<tr class="form-field mfc-term-bg-color-wrap">
					<th scope="row"><label for="mfc-term-bg-color"><?php esc_html_e( 'Background Color', 'loose' ); ?></label></th>
					<td>
						<?php wp_nonce_field( basename( __FILE__ ), 'mfc_term_bg_color_nonce' ); ?>
						<input type="text" name="mfc_term_bg_color" id="mfc-term-bg-color" value="<?php echo esc_attr( $color ); ?>" class="mfc-bg-color-field" data-default-color="<?php echo esc_attr( $default ); ?>" />
					</td>
				</tr>
		<?php
		}

				/**
				 * Edit term screen bg color field.
				 *
				 * @param type $term taxonomy term.
				 */
		public function edit_term_text_color_field( $term ) {

				$default = '#000000';
				$color   = $this->get_term_text_color( $term->term_id, true );

				if ( ! $color ) {
				$color = $default; }
				?>

				<tr class="form-field mfc-term-text-color-wrap">
					<th scope="row"><label for="mfc-term-text-color"><?php esc_html_e( 'Text Color', 'loose' ); ?></label></th>
					<td>
						<?php wp_nonce_field( basename( __FILE__ ), 'mfc_term_text_color_nonce' ); ?>
						<input type="text" name="mfc_term_text_color" id="mfc-term-text-color" value="<?php echo esc_attr( $color ); ?>" class="mfc-text-color-field" data-default-color="<?php echo esc_attr( $default ); ?>" />
					</td>
				</tr>
		<?php
		}

		/**
		 * New term screen image field.
		 *
		 * @param type $term taxonomy term.
		 */
		public function new_term_image_field( $term ) {

				wp_nonce_field( basename( __FILE__ ), 'mfc_term_image_nonce' );
				?>

				<div class="form-field mfc-category-form-field">
					<label for="mfc_category_image_imageholder"><?php esc_html_e( 'Image', 'loose' ); ?></label>

					<div id="mfc_category_image_imageholder" name="mfc_category_image_imageholder"></div>

					<div class="options" name="mfc_category_image_imageholder">
							<button class="button" id="mfc_category_image_upload_button"><?php esc_html_e( 'Upload', 'loose' ); ?></button>
							<button class="button" id="mfc_category_image_remove_button"><?php esc_html_e( 'Remove', 'loose' ); ?></button>
					</div>
				</div>

		<?php
		}

		/**
		 * Edit term screen image field.
		 *
		 * @param type $term taxonomy term.
		 */
		public function edit_term_image_field( $term ) {

				$default = '';
				$imageid = $this->get_term_image( $term->term_id, true );
				$image = wp_get_attachment_image_src( $imageid );

				if ( ! $image ) {
				$image = $default; }

				if ( ! $imageid ) {
				$imageid = $default; }
				?>

				<tr class="form-field mfc-category-form-field">

				<th scope="row">
					<label for="taxonomy_image"><?php esc_html_e( 'Category Image', 'loose' ); ?></label>
				</th>

				<td>
					<?php wp_nonce_field( basename( __FILE__ ), 'mfc_term_image_nonce' ); ?>
					<input type="hidden" name="mfc_term_image" id="mfc_category_image_attachment" value="<?php echo esc_attr( $imageid ); ?>">

					<div id="mfc_category_image_imageholder">
						<?php if ( ! empty( $imageid ) ) : ?>
							<img src="<?php echo esc_url( $image[0] ); ?>" width="180" id="mfc_category_image_image" />
						<?php endif; ?>
					</div>

					<div class="options">
							<button class="button" id="mfc_category_image_upload_button"><?php esc_html_e( 'Upload', 'loose' ); ?></button>
							<button class="button" id="mfc_category_image_remove_button"><?php esc_html_e( 'Remove', 'loose' ); ?></button>
					</div>
				</td>
			</tr>    

		<?php
		}

		/**
		 * Saving meta data - bg color.
		 *
		 * @param type $term_id taxonomy term ID.
		 * @return type
		 */
		public function save_term_bg_color( $term_id ) {

				if ( ! isset( $_POST['mfc_term_bg_color_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['mfc_term_bg_color_nonce'] ), basename( __FILE__ ) ) ) {
				return; }

				$old_color = $this->get_term_bg_color( $term_id );
				$new_color = isset( $_POST['mfc_term_bg_color'] ) ? sanitize_hex_color_no_hash( wp_unslash( $_POST['mfc_term_bg_color'] ) ) : '';

				if ( $old_color && '' === $new_color ) {
				delete_term_meta( $term_id, 'bg_color' ); } else if ( $old_color !== $new_color ) {
				update_term_meta( $term_id, 'bg_color', $new_color ); }
				}

				/**
				 * Saving meta data - text color.
				 *
				 * @param type $term_id taxonomy term ID.
				 * @return type
				 */
		public function save_term_text_color( $term_id ) {

				if ( ! isset( $_POST['mfc_term_text_color_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['mfc_term_text_color_nonce'] ), basename( __FILE__ ) ) ) {
				return; }

				$old_color = $this->get_term_text_color( $term_id );
				$new_color = isset( $_POST['mfc_term_text_color'] ) ? sanitize_hex_color_no_hash( wp_unslash( $_POST['mfc_term_text_color'] ) ) : '';

				if ( $old_color && '' === $new_color ) {
				delete_term_meta( $term_id, 'text_color' ); } else if ( $old_color !== $new_color ) {
				update_term_meta( $term_id, 'text_color', $new_color ); }
				}

		/**
		 * Saving meta data - image.
		 *
		 * @param type $term_id taxonomy term ID.
		 * @return type
		 */
		public function save_term_image( $term_id ) {

				if ( ! isset( $_POST['mfc_term_image_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['mfc_term_image_nonce'] ), basename( __FILE__ ) ) ) {
			 return; }

				$old_image = $this->get_term_image( $term_id );
				$new_image = isset( $_POST['mfc_term_image'] ) ? absint( $_POST['mfc_term_image'] ) : '';

				if ( $old_image && '' === $new_image ) {
				delete_term_meta( $term_id, 'image' ); } else if ( $old_image !== $new_image ) {
				update_term_meta( $term_id, 'image', $new_image ); }
				}

		/**
		 * Enqueue admin scripts
		 *
		 * @param type $hook_suffix hook suffix.
		 * @return type
		 */
		public function admin_enqueue_scripts( $hook_suffix ) {

				if ( ( 'edit-tags.php' !== $hook_suffix || 'category' !== get_current_screen()->taxonomy ) && ( 'term.php' !== $hook_suffix || 'category' !== get_current_screen()->taxonomy ) ) {
				return; }

				wp_enqueue_media();

				wp_enqueue_script(
						'category-image-js',
						get_template_directory_uri() . '/inc/js/categoryimage.js',
						array( 'jquery', 'wp-color-picker' ),
						'1.0.0',
						true
				);

				$data = array(
					// 'wp_version' => WP_VERSION,
					'label'      => array(
						'title'  => esc_html__( 'Choose Category Image', 'loose' ),
						'button' => esc_html__( 'Choose Image', 'loose' ),
					),
				);

				wp_localize_script(
						'category-image-js',
						'CategoryImage',
						$data
				);

				wp_enqueue_style( 'wp-color-picker' );
				wp_enqueue_script( 'wp-color-picker' );

				}
}

new Loose_Meta_For_Categories();

}// End if().
