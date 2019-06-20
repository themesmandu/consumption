<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package consumption
 */

get_header();
?>
<div class="container">
	<div class="row row-wrap">
		<main id="main">

			<?php if (have_posts()) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
						/* translators: %s: search query. */
						printf(esc_html__('Search Results for: %s', 'consumption'), '<span>' . get_search_query() . '</span>');
						?>
					</h1>
				</header><!-- .page-header -->
				<div class="blog-content">
					<?php
					/* Start the Loop */
					while (have_posts()) :
						the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
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
