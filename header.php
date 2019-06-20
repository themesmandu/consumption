<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package consumption
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<nav id="site-navigation" class="navbar main-navigation navbar-expand-lg top-navigation">
		<div class="container">
			<div class="site-branding">
				<?php
				if (has_custom_logo()) :
					the_custom_logo();
				else :
					the_custom_logo();
					?>
					<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
					<?php
					$consumption_description = get_bloginfo('description', 'display');
					if ($consumption_description || is_customize_preview()) :
						?>
						<p class="site-description"><?php echo $consumption_description; /* WPCS: xss ok. */ ?></p>
					<?php endif;
			endif; ?>
			</div><!-- .site-branding -->

			<button id="menu" class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmenus">
				<span></span>
				<span></span>
				<span></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbarmenus">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'navbar-nav',
					)
				);
				?>
			</div>
		</div>
	</nav><!-- #site-navigation -->

	<div id="content" class="site-content">