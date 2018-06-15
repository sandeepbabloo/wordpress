<?php
/**
 * Welcome Screen Class
 */
class venta_screen {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'venta_activation_admin_notice' ) );

	}
	
	public function venta_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'venta_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 * @sfunctionse 1.8.2.4
	 */
	public function venta_admin_notice() {
		?>			
		<div class="updated notice is-dismissible venta-notice">
			<h1><?php
			$theme_info = wp_get_theme();
			printf( esc_html__('Welcome to %1$s - Version %2$s', 'venta'), esc_html( $theme_info->Name ), esc_html( $theme_info->Version ) ); ?>
			</h1>
			<p><?php echo sprintf( esc_html__("Welcome! Thank you for choosing venta WordPress theme. To take full advantage of the features this theme has to offer visit our %1\$s welcome page %2\$s.", "venta"), '<a href="' . esc_url( admin_url( 'themes.php?page=venta-info' ) ) . '">', '</a>' ); ?></p>
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=venta-info' ) ); ?>" class="button button-blue-secondary button_venta" style="text-decoration: none;"><?php echo esc_html__('Get started with venta','venta'); ?></a></p>
		</div>
		<?php
	}
	
}

$GLOBALS['venta_screen'] = new venta_screen();