<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package consumption
 */

get_header();
?>
<div class="container">
	<div class="row row-wrap">
		<main id="main">
			<section class="content-heading">
				<h1><?php echo esc_html( get_theme_mod( 'front_heading' ) ); ?></h1>
				<p><?php echo esc_html( get_theme_mod( 'front_description' ) ); ?></p>
				<?php echo wp_kses_post( get_theme_mod( 'front_ad_area' ) ); ?>
				<?php get_search_form(); ?>
			</section>
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				$previous_post = get_previous_post();

				?>
				<div class="video-navigation blog-content">
				<?php if ( $previous_post ) : ?>
					<div class="previous">
						<span>Previous Video</span>
						<a href="<?php echo get_permalink( $previous_post->ID ); ?>">
							<div class="ytcont">
								<?php echo apply_filters( 'the_content', $previous_post->post_content ); ?>
								<h2 class="entry-title"><?php echo $previous_post->post_title; ?></h2>
							</div>
						</a>
					</div>
					<?php endif; ?>
					<?php
					$next_post = get_next_post();
					if ( $next_post ) :
						?>
					<div class="next">
						<span>Next Video</span>
						<a href="<?php echo get_permalink( $next_post->ID ); ?>">
							<div class="ytcont">
								<?php echo apply_filters( 'the_content', $next_post->post_content ); ?>
								<h2 class="entry-title"><?php echo $next_post->post_title; ?></h2>
							</div>
						</a>
					</div>
					<?php endif; ?>
				</div>
				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
		<?php
		get_sidebar();
		?>
	</div><!-- .row -->
</div><!-- .container -->
<?php
get_footer();
