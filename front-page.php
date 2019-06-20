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
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
style="display:block"
data-ad-client="{YOUR AD CLIENT ID}"
data-ad-slot="{YOUR AD SLOT ID}"
data-ad-format="auto"
data-color-border="FFFFFF"
data-color-bg="FFFFFF"
data-color-link="FFFFFF"
data-color-text="FFFFFF"
data-color-url="FFFFFF"> 
</ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
		<main id="main">
			<div class="section-wrap">
				<section class="content-heading">
					<h1><?php echo esc_html(get_theme_mod('front_heading')); ?></h1>
					<p><?php echo esc_html(get_theme_mod('front_description')); ?></p>
					<?php get_search_form(); ?>
				</section>

				<section class="section-one">

					<div class="heading">
						<h1><a href="<?php echo esc_url(get_category_link(get_theme_mod('front_category_1'))); ?>"> <?php echo get_cat_name(get_theme_mod('front_category_1')); ?></a></h1>
					</div>

					<div class="blog-content">
						<?php
						$args = array(
							'numberposts' => 8,
							'category'    => get_theme_mod('front_category_1'),
						);

						$consumption_front_posts = get_posts($args);
						if ($consumption_front_posts) {
							foreach ($consumption_front_posts as $consumption_front_post) :
								setup_postdata($consumption_front_post);
								?>
								<article>
									<a href="<?php esc_url(the_permalink($consumption_front_post)); ?>">
										<div class="ytcont">
											<?php
											echo apply_filters('the_content', $consumption_front_post->post_content);
											?>
										</div>
									</a>
									<h2 class="entry-title">
										<a href="<?php esc_url(the_permalink($consumption_front_post)); ?>">
											<?php
											echo apply_filters('the_title', $consumption_front_post->post_title);
											?>
										</a>
									</h2>
								</article>
							<?php
						endforeach;
						wp_reset_postdata();
					}
					?>
					</div>
					<a class="category_link" href="<?php echo esc_url(get_category_link(get_theme_mod('front_category_1'))); ?>">show more</a>
				</section>

				<section class="section-two">
					<div class="heading">
						<h1><a href="<?php echo esc_url(get_category_link(get_theme_mod('front_category_2'))); ?>"> <?php echo get_cat_name(get_theme_mod('front_category_2')); ?></a></h1>
					</div>

					<div class="blog-content">
						<?php
						$args = array(
							'numberposts' => 4,
							'category'    => get_theme_mod('front_category_2'),
						);

						$consumption_front_posts = get_posts($args);
						if ($consumption_front_posts) {
							foreach ($consumption_front_posts as $consumption_front_post) :
								setup_postdata($consumption_front_post);
								?>
								<article>
									<a href="<?php esc_url(the_permalink($consumption_front_post)); ?>">
										<div class="ytcont">
											<?php
											echo apply_filters('the_content', $consumption_front_post->post_content);
											?>
										</div>
									</a>
									<h2 class="entry-title">
										<a href="<?php esc_url(the_permalink($consumption_front_post)); ?>">
											<?php
											echo apply_filters('the_title', $consumption_front_post->post_title);
											?>
										</a>
									</h2>
								</article>
							<?php
						endforeach;
						wp_reset_postdata();
					}
					?>
					</div>
					<a class="category_link" href="<?php echo esc_url(get_category_link(get_theme_mod('front_category_2'))); ?>">show more</a>
				</section>

				<section class="section-three">
					<div class="heading">
						<h1><a href="<?php echo esc_url(get_category_link(get_theme_mod('front_category_3'))); ?>"> <?php echo get_cat_name(get_theme_mod('front_category_3')); ?></a></h1>
					</div>

					<div class="blog-content">
						<?php
						$args = array(
							'numberposts' => 4,
							'category'    => get_theme_mod('front_category_3'),
						);

						$consumption_front_posts = get_posts($args);
						if ($consumption_front_posts) {
							foreach ($consumption_front_posts as $consumption_front_post) :
								setup_postdata($consumption_front_post);
								?>
								<article>
									<a href="<?php esc_url(the_permalink($consumption_front_post)); ?>">
										<div class="ytcont">
											<?php
											echo apply_filters('the_content', $consumption_front_post->post_content);
											?>
										</div>
									</a>
									<h2 class="entry-title">
										<a href="<?php esc_url(the_permalink($consumption_front_post)); ?>">
											<?php
											echo apply_filters('the_title', $consumption_front_post->post_title);
											?>
										</a>
									</h2>
								</article>
							<?php

						endforeach;
						wp_reset_postdata();
					}
					?>
					</div>
					<a class="category_link" href="<?php echo esc_url(get_category_link(get_theme_mod('front_category_3'))); ?>">show more</a>
				</section>
			</div>
		</main><!-- #main -->
		<?php
		get_sidebar();
		?>
	</div><!-- .row -->
</div>

<?php
get_footer();
