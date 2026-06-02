<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// ==========================================================================
// CPT — simply_logo
// Admin-only (no public URLs). Featured image = logo. Meta: link URL.
// ==========================================================================

add_action( 'init', 'sls_register_cpt' );

function sls_register_cpt() {
	register_post_type( 'simply_logo', array(
		'labels' => array(
			'name'               => __( 'Logos', 'simply-logo-slider' ),
			'singular_name'      => __( 'Logo', 'simply-logo-slider' ),
			'add_new'            => __( 'Add New Logo', 'simply-logo-slider' ),
			'add_new_item'       => __( 'Add New Logo', 'simply-logo-slider' ),
			'edit_item'          => __( 'Edit Logo', 'simply-logo-slider' ),
			'new_item'           => __( 'New Logo', 'simply-logo-slider' ),
			'search_items'       => __( 'Search Logos', 'simply-logo-slider' ),
			'not_found'          => __( 'No logos found', 'simply-logo-slider' ),
			'not_found_in_trash' => __( 'No logos found in trash', 'simply-logo-slider' ),
			'menu_name'          => __( 'Logo Slider', 'simply-logo-slider' ),
		),
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_rest'        => false,
		'supports'            => array( 'title', 'thumbnail', 'page-attributes' ),
		'menu_icon'           => 'dashicons-images-alt2',
		'menu_position'       => 25,
	) );
}


// ==========================================================================
// META BOX — Logo Link URL
// ==========================================================================

add_action( 'add_meta_boxes', 'sls_add_meta_box' );

function sls_add_meta_box() {
	add_meta_box(
		'sls_logo_details',
		__( 'Logo Link', 'simply-logo-slider' ),
		'sls_meta_box_cb',
		'simply_logo',
		'normal',
		'high'
	);
}

function sls_meta_box_cb( $post ) {
	wp_nonce_field( 'sls_save_meta', 'sls_nonce' );
	$url = get_post_meta( $post->ID, '_logo_url', true );
	?>
	<style>
		.sls-meta-field label { display: block; font-weight: 600; margin-bottom: 4px; font-size: 13px; }
		.sls-meta-field input { width: 100%; padding: 6px 8px; border: 1px solid #ddd; border-radius: 3px; font-size: 13px; }
	</style>
	<div class="sls-meta-field">
		<label for="logo_url"><?php esc_html_e( 'Link URL', 'simply-logo-slider' ); ?> <em style="font-weight:400;color:#888">(optional — opens in new tab)</em></label>
		<input type="url" id="logo_url" name="logo_url"
			value="<?php echo esc_attr( $url ); ?>"
			placeholder="https://...">
	</div>
	<?php
}

add_action( 'save_post_simply_logo', 'sls_save_meta' );

function sls_save_meta( $post_id ) {
	if (
		! isset( $_POST['sls_nonce'] ) ||
		! wp_verify_nonce( $_POST['sls_nonce'], 'sls_save_meta' ) ||
		defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ||
		! current_user_can( 'edit_post', $post_id )
	) {
		return;
	}

	if ( isset( $_POST['logo_url'] ) ) {
		update_post_meta( $post_id, '_logo_url', esc_url_raw( $_POST['logo_url'] ) );
	}
}


// ==========================================================================
// ADMIN COLUMNS — thumbnail + URL
// ==========================================================================

add_filter( 'manage_simply_logo_posts_columns', 'sls_admin_columns' );

function sls_admin_columns( $columns ) {
	$new = array( 'cb' => $columns['cb'] );
	$new['sls_thumb'] = __( 'Logo', 'simply-logo-slider' );
	$new['title']     = $columns['title'];
	$new['sls_url']   = __( 'Link URL', 'simply-logo-slider' );
	$new['date']      = $columns['date'];
	return $new;
}

add_action( 'manage_simply_logo_posts_custom_column', 'sls_admin_column_content', 10, 2 );

function sls_admin_column_content( $column, $post_id ) {
	if ( $column === 'sls_thumb' ) {
		$thumb = get_the_post_thumbnail( $post_id, array( 80, 40 ), array( 'style' => 'max-height:40px;width:auto;' ) );
		echo $thumb ?: '&mdash;';
	}
	if ( $column === 'sls_url' ) {
		$url = get_post_meta( $post_id, '_logo_url', true );
		echo $url ? '<a href="' . esc_url( $url ) . '" target="_blank">' . esc_html( $url ) . '</a>' : '&mdash;';
	}
}
