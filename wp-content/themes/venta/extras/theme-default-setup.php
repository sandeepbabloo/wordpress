<?php 
add_action( 'tgmpa_register', 'venta_action_tgm_plugin_active_register_required_plugins' );
function venta_action_tgm_plugin_active_register_required_plugins() {
    if(class_exists('TGM_Plugin_Activation')){
      $plugins = array(
        array(
           'name'      => __('Coming Soon','venta'),
           'slug'      => 'coming-soon-wp',
           'required'  => false,
        ),
		array(
           'name'      => __('Team','venta'),
           'slug'      => 'dazzlersoft-teams',
           'required'  => false,
        ),
      );
      $config = array(
        'default_path' => '',
        'menu'         => 'venta-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
        'strings'      => array(
           'page_title'                      => __( 'Install Recommended Plugins', 'venta' ),
           'menu_title'                      => __( 'Install Plugins', 'venta' ),
           'installing'                      => __( 'Installing Plugin: %s', 'venta' ), 
           'oops'                            => __( 'Something went wrong with the plugin API.', 'venta' ),
           'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','venta' ), 
           'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','venta' ), 
           'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','venta' ), 
           'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','venta' ), 
           'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','venta' ), 
           'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','venta' ), 
           'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','venta' ), 
           'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','venta' ), 
           'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins','venta' ),
           'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins','venta' ),
           'return'                          => __( 'Return to Required Plugins Installer', 'venta' ),
           'plugin_activated'                => __( 'Plugin activated successfully.', 'venta' ),
           'complete'                        => __( 'All plugins installed and activated successfully. %s', 'venta' ), 
           'nag_type'                        => 'updated'
        )
      );
      tgmpa( $plugins, $config );
    }
}
?>