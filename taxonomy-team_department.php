<?php
/**
 * Team department taxonomy template.
 *
 * @package Langit
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	$langit_term = get_queried_object();
	langit_page_hero(
		array(
			'eyebrow' => esc_html__( 'Team Department', 'langit' ),
			'title'   => single_term_title( '', false ),
			'text'    => ! empty( $langit_term->description )
				? wp_strip_all_tags( $langit_term->description )
				: esc_html__( 'Daftar anggota tim berdasarkan fungsi leadership, teknis, support, dan operasional perusahaan.', 'langit' ),
		)
	);
	?>

	<section class="section section--surface">
		<div class="container stack">
			<div class="team-grid">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						langit_team_card( get_the_ID() );
					endwhile;
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
			</div>

			<?php the_posts_navigation(); ?>
		</div>
	</section>
</main>

<?php
get_footer();
