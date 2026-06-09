<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// ==========================================================================
// ADMIN SETTINGS PAGE
// Submenu under Logo Slider CPT. Stores defaults used by [simply_logos].
// Shortcode attributes always override these values.
// ==========================================================================

add_action( 'admin_menu', 'sls_add_settings_page' );

function sls_add_settings_page() {
	add_submenu_page(
		'edit.php?post_type=simply_logo',
		__( 'Slider Settings', 'simply-logo-slider' ),
		__( 'Settings', 'simply-logo-slider' ),
		'manage_options',
		'sls-settings',
		'sls_settings_page_cb'
	);
}

add_action( 'admin_init', 'sls_register_settings' );

function sls_register_settings() {
	register_setting( 'sls_settings_group', 'sls_height',  array( 'sanitize_callback' => 'absint', 'default' => 60  ) );
	register_setting( 'sls_settings_group', 'sls_speed',   array( 'sanitize_callback' => 'absint', 'default' => 30  ) );
	register_setting( 'sls_settings_group', 'sls_gap',     array( 'sanitize_callback' => 'absint', 'default' => 80  ) );
}

function sls_settings_page_cb() {
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Logo Slider Settings', 'simply-logo-slider' ); ?></h1>
		<p style="color:#666;margin-bottom:8px"><?php esc_html_e( 'Default values used by [simply_logos]. Override per-instance with shortcode attributes: height="60" speed="30" gap="80".', 'simply-logo-slider' ); ?></p>
		<p style="margin-bottom:24px">
			<?php printf(
				esc_html__( 'Part of the Simply Design plugin suite. %s', 'simply-logo-slider' ),
				'<a href="https://simplydesign.com" target="_blank" rel="noopener">simplydesign.com</a>'
			); ?>
		</p>

		<form method="post" action="options.php">
			<?php settings_fields( 'sls_settings_group' ); ?>

			<table class="form-table" role="presentation">

				<tr>
					<th scope="row">
						<label for="sls_height"><?php esc_html_e( 'Logo Height', 'simply-logo-slider' ); ?></label>
					</th>
					<td>
						<input type="number" id="sls_height" name="sls_height" min="20" max="300"
							value="<?php echo esc_attr( get_option( 'sls_height', 60 ) ); ?>"
							style="width:80px"> px
						<p class="description"><?php esc_html_e( 'Height of each logo image in pixels.', 'simply-logo-slider' ); ?></p>
					</td>
				</tr>

				<tr>
					<th scope="row">
						<label for="sls_speed"><?php esc_html_e( 'Scroll Speed', 'simply-logo-slider' ); ?></label>
					</th>
					<td>
						<input type="number" id="sls_speed" name="sls_speed" min="5" max="120"
							value="<?php echo esc_attr( get_option( 'sls_speed', 30 ) ); ?>"
							style="width:80px"> seconds
						<p class="description"><?php esc_html_e( 'Duration of one full scroll cycle. Lower = faster.', 'simply-logo-slider' ); ?></p>
					</td>
				</tr>

				<tr>
					<th scope="row">
						<label for="sls_gap"><?php esc_html_e( 'Gap Between Logos', 'simply-logo-slider' ); ?></label>
					</th>
					<td>
						<input type="number" id="sls_gap" name="sls_gap" min="0" max="300"
							value="<?php echo esc_attr( get_option( 'sls_gap', 80 ) ); ?>"
							style="width:80px"> px
						<p class="description"><?php esc_html_e( 'Space between each logo.', 'simply-logo-slider' ); ?></p>
					</td>
				</tr>

			</table>

			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}
