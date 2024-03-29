<?php
/**
 * Customizer custom controls
 *
 * @package Themesmandu
 * @subpackage Consumption
 * @since consumption 1.0.0
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

/**
 * Customize Control for Taxonomy Select.
 *
 * @since Consumption 1.0.0
 *
 * @see WP_Customize_Control
 */
class Consumption_Dropdown_Taxonomies_Control extends WP_Customize_Control {

	/**
	 * Control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'dropdown-taxonomies';

	/**
	 * Taxonomy.
	 *
	 * @access public
	 * @var string
	 */
	public $taxonomy = '';

	/**
	 * Constructor.
	 *
	 * @since Consumption 1.0.0
	 *
	 * @param WP_Customize_Manager $manager Customizer bootstrap instance.
	 * @param string               $id      Control ID.
	 * @param array                $args    Optional. Arguments to override class property defaults.
	 */
	public function __construct( $manager, $id, $args = array() ) {

		$taxonomy = 'category';
		if ( isset( $args['taxonomy'] ) ) {
			$taxonomy_exist = taxonomy_exists( esc_attr( $args['taxonomy'] ) );
			if ( true === $taxonomy_exist ) {
				$taxonomy = esc_attr( $args['taxonomy'] );
			}
		}
		$args['taxonomy'] = $taxonomy;
		$this->taxonomy   = esc_attr( $taxonomy );

		parent::__construct( $manager, $id, $args );
	}

	/**
	 * Render content.
	 *
	 * @since Consumption 1.0.0
	 */
	public function render_content() {

		$tax_args   = array(
			'hierarchical' => 0,
			'taxonomy'     => $this->taxonomy,
		);
		$taxonomies = get_categories( $tax_args );

		?>
	<label>
	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php if ( ! empty( $this->description ) ) : ?>
		<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		<?php endif; ?>
	<select <?php $this->link(); ?>>
			<?php
			printf( '<option value="%s" %s>%s</option>', '', selected( $this->value(), '', false ), '--None--' );
			?>
			<?php if ( ! empty( $taxonomies ) ) : ?>
				<?php foreach ( $taxonomies as $key => $tax ) : ?>
					<?php
					printf( '<option value="%s" %s>%s</option>', esc_attr( $tax->term_id ), selected( $this->value(), $tax->term_id, false ), esc_html( $tax->name ) );
					?>
			<?php endforeach ?>
			<?php endif ?>
	</select>
	</label>
		<?php
	}
}

