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

					<div id="equipe" class="team row row-section">
						<?php $team = new WP_Query( array( 'post_type' => 'equipe', 'posts_per_page' => 8, 'order'	=> 'DESC' ) ); ?>
							<?php if ( $team->have_posts() ) : ?>
								<?php while ( $team->have_posts() ) : $team->the_post();
  								get_template_part( 'template-parts/content', 'membre' );
							endwhile;?>
									<?php else : ?>
										<div>
											<?php get_template_part( 'template-parts/content', 'none' ); ?>
										</div>
										<?php endif; ?>
					</div>
			</div>

			<div id="services" class="services row row-section">
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
			<div id="portfolio" class="portfolio container row-section">
				<h2>Portfolio</h2>
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<?php $portfolio = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => 100, ) ); ?>
						<?php if ( $portfolio->have_posts() ) : ?>

							<ol class="carousel-indicators">
								<?php $i = 0; while ( $portfolio->have_posts() ) : $portfolio->the_post(); ?>
									<li data-target="#carousel-example-generic" data-slide-to="<?php echo $i ?>"></li>
									<?php $i++ ;?>
										<?php endwhile;?>
							</ol>
							<div class="carousel-inner" role="listbox">
								<?php while ( $portfolio->have_posts() ) : $portfolio->the_post(); ?>
									<div class="carousel-item" style="background-image: url('<?php the_post_thumbnail_url();?>')">
									  <div class="carousel-caption">
    <h4><?php the_title();?></h4>
  </div>
									</div>
									<?php endwhile;?>
							</div>

							<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
								<span class="icon-prev" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
								<span class="icon-next" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
							<?php else : ?>
								<div>
									<?php get_template_part( 'template-parts/content', 'none' ); ?>
								</div>
								<?php endif; ?>
				</div>
			</div>
			<div id="clients" class="clients row row-section">
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

			<div class="contact row">
				<div class="form col-md-6 row-section">
					<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Nous contacter') ) ?>
				</div>
				<div class="actu col-md-6">
					<div class="map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10497.437769434311!2d2.3068195!3d48.870424!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x71165b283afb6617!2sXprDev!5e0!3m2!1sfr!2sfr!4v1480432066244" width="100%" height="353" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
					<div class="links">
						<h2>Suivez notre actualité</h2>
					</div>
				</div>

			</div>
		</main>
		<!-- #main -->
	</div>
	<!-- #primary -->

	<?php
get_footer();
