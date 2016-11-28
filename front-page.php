<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package deadpool
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container-fluid" role="main">
		<div class="container">
			<!-- Description de l'entreprise -->
			<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Qui sommes nous') ) ?>
				<!-- Equipe -->

				<div class="team row row-section">
					<?php $team = new WP_Query( array( 'post_type' => 'equipe', 'posts_per_page' => 8, 'order'	=> 'DESC' ) ); ?>
						<?php if ( $team->have_posts() ) : ?>
							<?php while ( $team->have_posts() ) : $team->the_post();
  								get_template_part( 'template-parts/content', 'membre' );
							endwhile;?>
						<?php else : ?>
							<div> <?php get_template_part( 'template-parts/content', 'none' ); ?> </div>
						<?php endif; ?>
				</div>
		</div>

			<div class="services row row-section">
			<div class="container">
							<h2>Nos services</h2>
								<?php $services = new WP_Query( array( 'post_type' => 'services', 'posts_per_page' => 9, ) ); ?>
					<?php if ( $services->have_posts() ) : ?>

						<?php	while ( $services->have_posts() ) : $services->the_post();
  								get_template_part( 'template-parts/content','service' );
							endwhile;?>
					 	<?php else : ?>
							<div>
								<?php get_template_part( 'template-parts/content', 'none' ); ?>
							</div>
				<?php endif; ?>
			</div>

			</div>
<div class="portfolio container row-section">
<h2>Portfolio</h2>
</div>
			<div class="clients row row-section">
						<div class="container">
							<h2>Nos clients</h2>
								<?php $clients = new WP_Query( array( 'post_type' => 'clients', 'posts_per_page' => 9, ) ); ?>
					<?php if ( $clients->have_posts() ) : ?>

						<?php	while ( $clients->have_posts() ) : $clients->the_post();
  								get_template_part( 'template-parts/content','client' );
							endwhile;?>
					 	<?php else : ?>
							<div>
								<?php get_template_part( 'template-parts/content', 'none' ); ?>
							</div>
				<?php endif; ?>
			</div>
			</div>

	<div class="contact row row-section">
	<div class="container">
	<div class="form col-md-6">
			<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Nous contacter') ) ?>
	</div>

		<div class="actu col-md-6">
	<h2>Suivez notre actualité</h2>
</div>
	</div>
</div>


<div class="map">

</div>




		</main>
		<!-- #main -->
	</div>
	<!-- #primary -->

	<?php
get_footer();
