<?php
/**
 * Single team member content.
 *
 * @package Langit
 */

$langit_position   = get_post_meta( get_the_ID(), 'langit_team_position', true );
$langit_experience = get_post_meta( get_the_ID(), 'langit_team_experience', true );
$langit_linkedin   = get_post_meta( get_the_ID(), 'langit_team_linkedin', true );
$langit_email      = get_post_meta( get_the_ID(), 'langit_team_email', true );
$langit_expertise  = langit_get_team_expertise_items( get_the_ID() );
$langit_terms      = get_the_terms( get_the_ID(), 'team_department' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Person">
	<header class="single-hero">
		<div class="single-hero__content stack">
			<p class="section-eyebrow"><?php esc_html_e( 'Team Profile', 'langit' ); ?></p>
			<?php if ( ! is_wp_error( $langit_terms ) && ! empty( $langit_terms ) ) : ?>
				<div class="post-card__term">
					<?php
					$langit_term_links = array();
					foreach ( $langit_terms as $langit_term ) {
						$langit_term_links[] = sprintf(
							'<a href="%1$s" rel="tag">%2$s</a>',
							esc_url( get_term_link( $langit_term ) ),
							esc_html( $langit_term->name )
						);
					}
					echo wp_kses_post( implode( ', ', $langit_term_links ) );
					?>
				</div>
			<?php endif; ?>
			<?php the_title( '<h1 class="entry-title" itemprop="name">', '</h1>' ); ?>
			<?php if ( ! empty( $langit_position ) ) : ?>
				<p class="lede" itemprop="jobTitle"><?php echo esc_html( $langit_position ); ?></p>
			<?php endif; ?>
		</div>
	</header>

	<section class="section section--compact">
		<div class="container project-detail-grid team-profile-layout">
			<div class="stack">
				<?php if ( has_post_thumbnail() ) : ?>
					<figure class="single-featured-image team-profile-image">
						<?php the_post_thumbnail( 'langit-social', array_merge( langit_featured_image_attrs( true ), array( 'itemprop' => 'image' ) ) ); ?>
					</figure>
				<?php endif; ?>

				<div class="card project-detail-card">
					<p class="section-eyebrow"><?php esc_html_e( 'Profile Information', 'langit' ); ?></p>
					<dl class="project-meta-list">
						<?php if ( ! empty( $langit_position ) ) : ?>
							<div>
								<dt><?php esc_html_e( 'Position / Role', 'langit' ); ?></dt>
								<dd><?php echo esc_html( $langit_position ); ?></dd>
							</div>
						<?php endif; ?>
						<?php if ( ! empty( $langit_experience ) ) : ?>
							<div>
								<dt><?php esc_html_e( 'Experience', 'langit' ); ?></dt>
								<dd><?php echo esc_html( $langit_experience ); ?></dd>
							</div>
						<?php endif; ?>
						<?php if ( ! empty( $langit_linkedin ) ) : ?>
							<div>
								<dt><?php esc_html_e( 'LinkedIn', 'langit' ); ?></dt>
								<dd><a href="<?php echo esc_url( $langit_linkedin ); ?>"><?php esc_html_e( 'View Profile', 'langit' ); ?></a></dd>
							</div>
						<?php endif; ?>
						<?php if ( ! empty( $langit_email ) ) : ?>
							<div>
								<dt><?php esc_html_e( 'Email', 'langit' ); ?></dt>
								<dd><a href="<?php echo esc_url( 'mailto:' . $langit_email ); ?>"><?php echo esc_html( $langit_email ); ?></a></dd>
							</div>
						<?php endif; ?>
					</dl>
				</div>
			</div>

			<div class="stack">
				<p class="section-eyebrow"><?php esc_html_e( 'Biography', 'langit' ); ?></p>
				<div class="single-content" itemprop="description">
					<?php
					the_content();

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'langit' ),
							'after'  => '</div>',
						)
					);
					?>
				</div>

				<?php if ( ! empty( $langit_expertise ) ) : ?>
					<div class="card project-detail-card">
						<p class="section-eyebrow"><?php esc_html_e( 'Expertise', 'langit' ); ?></p>
						<ul class="tag-cloud">
							<?php foreach ( $langit_expertise as $langit_item ) : ?>
								<li><span><?php echo esc_html( $langit_item ); ?></span></li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<section class="section section--surface">
		<div class="container stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => esc_html__( 'Related Team', 'langit' ),
					'title'   => esc_html__( 'Team members connected to this department.', 'langit' ),
					'center'  => true,
				)
			);

			$langit_related_args = array(
				'post_type'              => 'team',
				'post_status'            => 'publish',
				'posts_per_page'         => 3,
				'post__not_in'           => array( get_the_ID() ),
				'orderby'                => array(
					'menu_order' => 'ASC',
					'title'      => 'ASC',
				),
				'no_found_rows'          => true,
				'update_post_meta_cache' => true,
				'update_post_term_cache' => true,
			);

			if ( ! is_wp_error( $langit_terms ) && ! empty( $langit_terms ) ) {
				$langit_related_args['tax_query'] = array(
					array(
						'taxonomy' => 'team_department',
						'field'    => 'term_id',
						'terms'    => wp_list_pluck( $langit_terms, 'term_id' ),
					),
				);
			}

			$langit_related_team = new WP_Query( $langit_related_args );
			?>

			<?php if ( $langit_related_team->have_posts() ) : ?>
				<div class="team-grid">
					<?php
					while ( $langit_related_team->have_posts() ) :
						$langit_related_team->the_post();
						langit_team_card( get_the_ID() );
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			<?php else : ?>
				<p class="lede"><?php esc_html_e( 'Tambahkan anggota tim lain untuk menampilkan rekomendasi tim terkait secara otomatis.', 'langit' ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<?php langit_global_cta( 'contact' ); ?>
</article>
