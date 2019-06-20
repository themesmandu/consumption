<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package consumption
 */

get_header();
?>
<div class="container">
	<div class="row row-wrap">
		<main id="main">


			<?php
			if (have_posts()) :

				if (is_home() && !is_front_page()) :
					?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
				<?php
			endif;
			?>
				<div class="blog-content">
					<?php
					/* Start the Loop */
					while (have_posts()) :
						the_post();

						/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
						get_template_part('template-parts/content', 'custom');

					endwhile;

					the_posts_pagination(
						array(
							'mid_size'  => 2,
							'prev_text' => '<span class="previous">' . __('Prev', 'ghumgham'),
							'next_text' => '<span class="next">' . __('Next', 'ghumgham'),
						)
					);
					?>
				</div>
			<?php
		else :

			get_template_part('template-parts/content', 'none');

		endif;
		?>
		</main><!-- #main -->
		<?php
		get_sidebar();
		?>
	</div><!-- .row -->
</div><!-- .container -->
<?php
get_footer();
