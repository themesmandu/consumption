<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package consumption
 */

?>

</div><!-- #content -->

<?php if (is_active_sidebar('footer_widget')) { ?>
	<footer id="footer">
		<div class="container">
			<div id="footer-widgets">
				<?php dynamic_sidebar('footer_widget'); ?>
			</div><!-- #footer-widgets -->

			<div id="colophon" class="site-footer">
				<?php
				$copyright_text = 'copyright';
				/* translators: %s: consumption. */
				$powered_by_text = sprintf(esc_html__('&copy; %1$s %2$s by %3$s', 'consumption'), date('Y'), esc_html(wp_get_theme()->get('Name')), '&nbsp;<a target="_blank" href="' . esc_url(wp_get_theme()->get('AuthorURI')) . '">' . esc_html(ucwords(wp_get_theme()->get('Author'))) . '</a>');
				?>
				<?php if (!empty($copyright_text) || !empty($powered_by_text)) : ?>
					<div class="colophon-bottom">
						<div class="copyright">
							<p><?php echo wp_kses_post($copyright_text); ?> <?php echo wp_kses_post($powered_by_text); ?></p>
						</div><!-- .copyright -->
					</div><!-- .colophon-bottom -->
				<?php endif; ?>
			</div><!-- #colophon -->

			<div class="social-menu-content">
			<?php
			if (has_nav_menu('menu-2')) :
				wp_nav_menu(
					array(
						'theme_location' => 'menu-2',
						'menu_id'        => 'social-menu',
					)
				);
			endif;
			?>
			</div>
		</div>
	</footer>
<?php } ?>

<?php wp_footer(); ?>

</body>

</html>