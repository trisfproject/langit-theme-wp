<?php
/**
 * Quote request and consultation helpers.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return the Quote page URL fallback.
 *
 * @return string
 */
function langit_get_quote_url() {
	$page = get_page_by_path( 'quote' );

	return $page ? get_permalink( $page ) : home_url( '/quote/' );
}

/**
 * Return a WhatsApp URL for quote consultations.
 *
 * @return string
 */
function langit_quote_whatsapp_url() {
	$url = langit_theme_mod( 'quote_whatsapp_url' );

	return $url ? $url : langit_contact_whatsapp_url();
}

/**
 * Render a quote form shortcode or a graceful placeholder.
 */
function langit_quote_form_area() {
	$shortcode       = trim( langit_theme_mod( 'quote_form_shortcode' ) );
	$shortcode_ready = false;

	if ( preg_match( '/\[([a-zA-Z0-9_-]+)/', $shortcode, $matches ) ) {
		$shortcode_ready = shortcode_exists( $matches[1] );
	}
	?>
	<div id="quote-form" class="form-placeholder quote-form-panel">
		<?php if ( ! empty( $shortcode ) && $shortcode_ready ) : ?>
			<div class="contact-form-panel__shortcode fluentform">
				<?php echo do_shortcode( wp_kses_post( $shortcode ) ); ?>
			</div>
		<?php else : ?>
			<div class="form-placeholder__fields quote-form-placeholder" aria-hidden="true">
				<span><?php esc_html_e( 'Name', 'langit' ); ?></span>
				<span><?php esc_html_e( 'Company', 'langit' ); ?></span>
				<span><?php esc_html_e( 'Email', 'langit' ); ?></span>
				<span><?php esc_html_e( 'Phone / WhatsApp', 'langit' ); ?></span>
				<span><?php esc_html_e( 'Service Type', 'langit' ); ?></span>
				<span><?php esc_html_e( 'Estimated Timeline', 'langit' ); ?></span>
				<span><?php esc_html_e( 'Location', 'langit' ); ?></span>
				<span class="form-placeholder__message"><?php esc_html_e( 'Project Description', 'langit' ); ?></span>
			</div>
			<div class="shortcode-placeholder">
				<?php echo esc_html( ! empty( $shortcode ) ? $shortcode : __( 'Add a quote form shortcode in Appearance > Customize.', 'langit' ) ); ?>
			</div>
		<?php endif; ?>
	</div>
	<?php
}

/**
 * Render dynamic service selection controls.
 */
function langit_quote_service_selection() {
	$service_query = new WP_Query(
		array(
			'post_type'              => 'service',
			'post_status'            => 'publish',
			'posts_per_page'         => absint( langit_theme_mod( 'quote_service_count' ) ),
			'orderby'                => array(
				'menu_order' => 'ASC',
				'title'      => 'ASC',
			),
			'no_found_rows'          => true,
			'update_post_meta_cache' => true,
			'update_post_term_cache' => true,
		)
	);

	if ( ! $service_query->have_posts() ) {
		?>
		<p class="lede"><?php esc_html_e( 'Tambahkan data Services untuk menampilkan pilihan layanan quotation secara dinamis.', 'langit' ); ?></p>
		<?php
		return;
	}
	?>
	<form class="quote-service-selector" action="#quote-form" method="get">
		<div class="quote-service-grid">
			<?php
			while ( $service_query->have_posts() ) :
				$service_query->the_post();
				?>
				<label class="quote-service-option card">
					<input type="checkbox" name="service[]" value="<?php echo esc_attr( sanitize_title( get_the_title() ) ); ?>">
					<span>
						<strong><?php the_title(); ?></strong>
						<?php if ( has_excerpt() ) : ?>
							<small><?php echo esc_html( get_the_excerpt() ); ?></small>
						<?php endif; ?>
					</span>
				</label>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
		<button class="button button--outline quote-service-submit" type="submit"><?php echo esc_html( langit_theme_mod( 'quote_service_button_text' ) ); ?></button>
	</form>
	<?php
}

/**
 * Render reusable consultation support cards.
 */
function langit_quote_consultation_cards() {
	$cards = array(
		array(
			'title' => esc_html__( 'Free Consultation', 'langit' ),
			'text'  => esc_html__( 'Diskusikan kebutuhan awal, ruang lingkup pekerjaan, dan prioritas sistem yang ingin dibangun.', 'langit' ),
		),
		array(
			'title' => esc_html__( 'Project Discussion', 'langit' ),
			'text'  => esc_html__( 'Sampaikan kondisi lokasi, kebutuhan teknis, dan target implementasi agar tim dapat menyiapkan arahan solusi.', 'langit' ),
		),
		array(
			'title' => esc_html__( 'Technical Survey', 'langit' ),
			'text'  => esc_html__( 'Tim dapat membantu meninjau kebutuhan lapangan untuk menentukan titik instalasi, perangkat, dan integrasi sistem.', 'langit' ),
		),
		array(
			'title' => esc_html__( 'Maintenance Support', 'langit' ),
			'text'  => esc_html__( 'Konsultasikan kebutuhan pemeliharaan agar performa sistem tetap stabil dan mudah dipantau.', 'langit' ),
		),
	);
	?>
	<div class="quote-support-grid">
		<?php foreach ( $cards as $card ) : ?>
			<article class="card quote-support-card">
				<h3><?php echo esc_html( $card['title'] ); ?></h3>
				<p><?php echo esc_html( $card['text'] ); ?></p>
			</article>
		<?php endforeach; ?>
	</div>
	<?php
}
