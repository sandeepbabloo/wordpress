<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Erzen_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		get_template_part('inc/upgrade/section-pro');
		
		// Register custom section types.
		$manager->register_section_type( 'Erzen_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Erzen_Customize_Section_Pro(
				$manager,
				'erzen',
				array(
					'title'    => esc_html__( 'Theme Documentation', 'erzen' ),
					'pro_text' => esc_html__( 'Click Here', 'erzen' ),
					'pro_url'  => 'https://wpshopmart.com/docs/themes/erzen/index.html',
					'priority'  => 1
				)
			)
		);
		
		// Register sections.
		$manager->add_section(
			new Erzen_Customize_Section_Pro(
				$manager,
				'upgrade-pro',
				array(
					'title'    => esc_html__( 'Upgrade To Pro', 'erzen' ),
					'pro_text' => esc_html__( 'View Pro', 'erzen' ),
					'pro_url'  => 'https://wpshopmart.com/wordpress-themes/erzen-pro/',
					'priority'  => 2
				)
			)
		);
	}


	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'erzen-customize-controls', trailingslashit( get_template_directory_uri() ) . '/inc/upgrade/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'erzen-customize-controls', trailingslashit( get_template_directory_uri() ) . '/inc/upgrade/customize-controls.css' );
	}
}

// Doing this customizer thang!
Erzen_Customize::get_instance();
