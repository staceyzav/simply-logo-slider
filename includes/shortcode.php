<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// ==========================================================================
// SHORTCODE — [simply_logos]
//
// Usage:
//   [simply_logos]
//   [simply_logos height="60" speed="30" gap="80" limit="-1"]
//
// height  — logo height in px (default: 60)
// speed   — scroll duration in seconds — lower = faster (default: 30)
// gap     — space between logos in px (default: 80)
// limit   — max logos to show, -1 for all (default: -1)
// ==========================================================================

add_shortcode( 'simply_logos', 'sls_shortcode' );

function sls_shortcode( $atts ) {

	$atts = shortcode_atts( array(
		'height' => get_option( 'sls_height', 60 ),
		'speed'  => get_option( 'sls_speed',  30 ),
		'gap'    => get_option( 'sls_gap',     80 ),
		'limit'  => -1,
	), $atts, 'simply_logos' );

	$height = absint( $atts['height'] );
	$speed  = absint( $atts['speed'] );
	$gap    = absint( $atts['gap'] );
	$limit  = intval( $atts['limit'] );

	$logos = new WP_Query( array(
		'post_type'      => 'simply_logo',
		'posts_per_page' => $limit,
		'post_status'    => 'publish',
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
	) );

	if ( ! $logos->have_posts() ) {
		return '';
	}

	$inline = sprintf(
		'--sls-speed: %ds; --sls-gap: %dpx; --sls-height: %dpx;',
		$speed, $gap, $height
	);

	ob_start();
	?>
	<div class="sls-slider" style="<?php echo esc_attr( $inline ); ?>" data-sls>
		<div class="sls-track">

			<?php while ( $logos->have_posts() ) : $logos->the_post(); ?>
				<?php
				$url     = get_post_meta( get_the_ID(), '_logo_url', true );
				$img_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
				$alt     = esc_attr( get_the_title() );

				if ( ! $img_url ) continue;

				$img = '<img src="' . esc_url( $img_url ) . '" alt="' . $alt . '" loading="lazy">';
				?>
				<?php if ( $url ) : ?>
					<a class="sls-logo" href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer" title="<?php echo $alt; ?>">
						<?php echo $img; ?>
					</a>
				<?php else : ?>
					<span class="sls-logo">
						<?php echo $img; ?>
					</span>
				<?php endif; ?>

			<?php endwhile; wp_reset_postdata(); ?>

		</div>
	</div>
	<?php
	return ob_get_clean();
}
