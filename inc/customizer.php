<?php
/**
 * Consumption Theme Customizer
 *
 * @package consumption
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function consumption_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'consumption_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'consumption_customize_partial_blogdescription',
			)
		);
	}

	// load custom control dropdown taxonomy.
	require get_template_directory() . '/inc/class-consumption-dropdown-taxonomies-control.php';

	// Add panel for front page theme options.
	$wp_customize->add_panel(
		'consumption_front_page_panel',
		array(
			'title'       => esc_html__( 'Consumption Front Page Options', 'consumption' ),
			'description' => esc_html__( 'Consumption Front Page Options.', 'consumption' ),
			'priority'    => 150,
		)
	);

	// Add category heading section.
	$wp_customize->add_section(
		'consumption_front_heading',
		array(
			'title'       => esc_html__( 'Heading and Description', 'consumption' ),
			'description' => esc_html__( 'Front page heading and description.', 'consumption' ),
			'panel'       => 'consumption_front_page_panel',
		)
	);

	// setting front page heading.
	$wp_customize->add_setting(
		'front_heading',
		array(
			'default'           => 'Welcome to thee daily dose of awesome videos',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'front_heading',
		array(
			'label'       => esc_html__( 'Front Page Heading', 'consumption' ),
			'description' => esc_html__( 'This heading will appear in front page.', 'consumption' ),
			'section'     => 'consumption_front_heading',
			'type'        => 'text',
		)
	);

	// setting Front description.
	$wp_customize->add_setting(
		'front_description',
		array(
			'default'           => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. when an unknown printer took a galley of type and scrambled it to make a type specimen book',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'front_description',
		array(
			'label'       => esc_html__( 'Front Page Description', 'consumption' ),
			'description' => esc_html__( 'This description will appear in front page.', 'consumption' ),
			'section'     => 'consumption_front_heading',
			'type'        => 'textarea',
		)
	);

	// setting front ad area.
	$wp_customize->add_setting(
		'front_ad_area',
		array(
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		'front_ad_area',
		array(
			'label'       => esc_html__( 'Put your AD code here', 'consumption' ),
			'description' => esc_html__(
				'Note: This AD will appear after the search box',
				'consumption'
			),
			'section'     => 'consumption_front_heading',
			'type'        => 'textarea',
		)
	);

	// Add category select section.
	$wp_customize->add_section(
		'consumption_category_select',
		array(
			'title'       => esc_html__( 'Category Select', 'consumption' ),
			'description' => esc_html__( 'Category Select For Front Page.', 'consumption' ),
			'panel'       => 'consumption_front_page_panel',
		)
	);

	for ( $i = 1; $i <= 10; $i++ ) {
		$wp_customize->add_setting(
			'front_category_' . $i,
			array(
				'sanitize_callback' => 'absint',
			)
		);

			// Add dropdown category home page setting and control.
		$wp_customize->add_control(
			new Consumption_Dropdown_Taxonomies_Control(
				$wp_customize,
				'front_category_' . $i,
				array(
					/* translators: %d: category number. */
					'label'       => sprintf( esc_html__( 'Select category for section %d', 'consumption' ), $i ),
					'description' => esc_html__(
						'Note: Selected category\'s videos will be shown front page section',
						'consumption'
					),
					'section'     => 'consumption_category_select',
					'type'        => 'dropdown-taxonomies',
					'taxonomy'    => 'category',
				)
			)
		);

		// setting category ad area.
		$wp_customize->add_setting(
			'front_category_ad_' . $i,
			array(
				'sanitize_callback' => 'wp_kses_post',
			)
		);
		$wp_customize->add_control(
			'front_category_ad_' . $i,
			array(
				'label'       => esc_html__( 'Put your AD code here', 'consumption' ),
				'description' => esc_html__(
					'Note: This AD will appear after the videos of the category',
					'consumption'
				),
				'section'     => 'consumption_category_select',
				'type'        => 'textarea',
			)
		);
	}

}
add_action( 'customize_register', 'consumption_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function consumption_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function consumption_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function consumption_customize_preview_js() {
	wp_enqueue_script( 'consumption-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'consumption_customize_preview_js' );
