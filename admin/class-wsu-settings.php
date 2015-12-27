<?php
defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );


/**
* PLUGIN SETTINGS PAGE
*/
class WsuOptions {
    /**
     * Holds the values to be used in the fields callbacks
     */
    public $trail_story_options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_wsu_menu_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_wsu_menu_page() {

        // This page will be under "Settings"add_submenu_page( 'tools.php', 'SEO Image Tags', 'SEO Image Tags', 'manage_options', 'seo_image_tags', 'seo_image_tags_options_page' );

        add_submenu_page(
            'tools.php',
            'Wasserman Store Utility',
            'Wasserman Store Utility',
            'manage_options',
            'wsu-options-page',
            array( $this, 'create_wsu_settings_page' )
        );
        /*add_submenu_page(
            'trail-story',
            'Itineraries',
            'Itineraries',
            'manage_options',
            'edit.php?post_type=itinerary'
        );

        add_submenu_page(
            'trail-story',
            'Trail Stories',
            'Trail Stories<span class="awaiting-mod count-' . $pending_count . '"><span class="pending-count">' . $pending_count . '</span></span>',
            'manage_options',
            'edit.php?post_type=trail-story'
        );

        add_submenu_page(
            'trail-story',
            'Trail Conditions',
            'Trail Conditions',
            'manage_options',
            'edit.php?post_type=trail-condition'
        );

        add_submenu_page(
            'geo-trail-map',
            'Settings',
            'Trail Settings',
            'manage_options',
            'trail-trail-map-settings',
            array( $this, 'create_trail_story_settings_page' )
        );*/

        
    }
    


    /**
     * Options page callback
     */
    public function create_wsu_settings_page() {
        // Set class property
        $this->trail_story_options = get_option( 'wsu_option' );
        ?>
        <div class="wrap">
            <h1>Utility</h1>
            <form method="post" action="options.php">

            <?php
                // This prints out all hidden setting fields
                settings_fields( 'wsu_options_group' );
                do_settings_sections( 'wsu-settings-options' );
                submit_button('Save Options');
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init() {

        global $geo_mashup_options;

        register_setting(
            'wsu_options_group', // Option group
            'wsu_options', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'wsu_options_section', // ID
            '', // Title
            array( $this, 'print_option_info' ), // Callback
            'wsu-settings-options' // Page
        );

        add_settings_section(
            'wsu_option', // ID
            '', // Title
            array( $this, 'wsu_option_callback' ), // Callback
            'wsu-option', // Page
            'wsu_options_section' // Section
        );

    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input ) {
        $new_input = array();

        if( isset( $input['wsu_option'] ) )
            $new_input['wsu_option'] = absint( $input['wsu_option'] );

        return $input;
    }

    /**
     * Print the Section text
     */
    public function print_option_info() { ?>
        <div id="plugin-info-header" class="plugin-info header">
            <div class="plugin-info content">
                <hr>
                    <h3><strong>Wasserman Store Utility</strong></h3> 
                    <h4>For help or support please email <a href="mailto:andrewmgunn26@gmail.com">andrewmgunn26@gmail.com</a></h4>
                <hr>
                <div class="credits">
                    <div>
                        <h4>Lead Developer</h4>
                        <a target="_blank" href="http://andrewgunn.xyz">Andrew Gunn</a>
                    </div>
                    <hr>
                </div>
            </div>
    <?php }
    
    public function wsu_option_callback() {
        //Get plugin options
        $options = get_option( 'wsu_options' );

        if (isset($options['wsu_options'])) {
            //$html .= '<input type="checkbox" id="enable_outofstock_reports"
             //name="wsu_options[enable_outofstock_reports]" value="1"' . checked( 1, $options['enable_outofstock_reports'], false ) . '/>';
        } else {
            //$html .= '<input type="checkbox" id="enable_outofstock_reports"
             //name="outofstock_settings_option[enable_outofstock_reports]" value="1"' . checked( 1, $options['enable_outofstock_reports'], false ) . '/>';
        }

        echo $html;
    }
}

if( is_admin() )
    $utility = new WsuOptions();