<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package consumption
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	echo '<div class="ytcont">';
	the_content('');
	echo '</div>';

	?>

	<div class="description">
		<header class="entry-header">
			<?php
			if (is_singular()) :
				the_title('<h1 class="entry-title">', '</h1>');
			else :
				the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
			endif; ?>
		</header><!-- .entry-header -->

		<?php
		echo '<div class="ytcont">';
		the_content('');
		echo '</div>';

		?>
	</div>

	<?php
	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . esc_html__('Pages:', 'consumption'),
			'after'  => '</div>',
		)
	);
	?>
</article><!-- #post-<?php the_ID(); ?> -->