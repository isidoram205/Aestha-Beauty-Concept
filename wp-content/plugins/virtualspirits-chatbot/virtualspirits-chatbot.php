<?php
/*
Plugin Name: VirtualSpirits Chatbot
Description: VirtualSpirits Chatbot and LiveChat for your WordPress site
Version: 3.0
Author: VirtualSpirits
Author URI: https://www.virtualspirits.com
License: GPLv2
*/
add_action('init', 'virtualspirits');
function virtualspirits(){

/**
 * Function Activate GA-Code
 *
 * @since 1.0
 *
 */

register_activation_hook( __FILE__, 'virtualspirits_install' );

/**
 * Function Compare Version of WP else Desactive Plugin
 *
 * @since 1.0
 *
 */

function virtualspirits_install() {

  if ( version_compare( PHP_VERSION, '5.2.1', '<' ) or version_compare( get_bloginfo( 'version' ), '3.3', '<' ) ) {

      deactivate_plugins( basename( __FILE__ ) );

  }

  add_option( 'virtualspirits', 'Disable' );
}
}

/**
 * Admin Page Functions
 *
 * @since 1.0
 *
 */
if ( is_admin() ){

	add_action('admin_menu', 'virtualSpirits_addMenu');
	
}

/**
 * Function add Page Options in WP Menu
 *
 * @since 1.0
 *
*/

function virtualSpirits_addMenu() {

  add_menu_page( 'Virtual Spirits', 'Virtual Spirits', 'manage_options', 'virtual-spirits-options', 'virtualSpirits_content' );

}

/**
*
* Scripts on Footer
*
* @since 1.0
*/
function virtualSpirits_footer() {
    $token = get_option('virtualspirits');
    $status = get_option('virtualspirits_status');
    if($status=='Enable' && !empty($token)){
        echo "
        <!-- VirtualSpirits Script-->
        <script type='text/javascript'>
             var vsid = '".esc_html($token)."';
             (function() { 
             var vsjs = document.createElement('script'); vsjs.type = 'text/javascript'; vsjs.async = true; vsjs.setAttribute('defer', 'defer');
              vsjs.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'www.virtualspirits.com/vsa/chat.js';
               var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(vsjs, s);
             })();
        </script>";
    }
}
add_action('wp_footer', 'virtualSpirits_footer');


/**
 * Admin Page Options
 *
 * @since 1.0
 *
 */
function virtualSpirits_content() {

if(isset($_POST['virtualspirits_status']) && isset($_POST['virtualspirits'])){
    
    $status = sanitize_text_field( trim($_POST['virtualspirits_status']) );
    $virtualspirits_id = sanitize_key( trim($_POST['virtualspirits']) );
    
    update_option( 'virtualspirits', $virtualspirits_id );
    update_option( 'virtualspirits_status', $status );
    
    if($_POST['virtualspirits_status'] == "Enable"){ ?>
        <div class="wrap">
            <div class="notice notice-success is-dismissible">
                <p><?php _e( 'Your chatbot code has been activated on your website. If you cannot see the chatbot on your website please refresh your website page'); ?></p>
            </div>
        </div><?php }else{ ?>
        <div class="wrap">
            <div class="notice notice-success is-dismissible">
                <p><?php _e( 'Your chatbot code has been removed from your website. If you still see the chatbot on your website please refresh your website page'); ?></p>
            </div>
        </div>
    <?php } } ?><div class="wrap">
    <div id="poststuff">
        <div id="postbox-container" class="postbox-container">
            <div class="meta-box-sortables ui-sortable" id="normal-sortables">
                <div class="postbox " id="test1">
                    <div title="Click to toggle" class="handlediv"><br></div>
                    <h3 class="hndle"><span>My VirtualSpirits Chatbot ID</span></h3>
                    <div class="inside">
                    <p>If you don't know your VirtualSpirits chatbot ID then follow this <a target="_blank" href="https://www.virtualspirits.com/chatbot_wordpress_plugin_guide.aspx">link</a> to our installation guide</p>
                    <br>
                    <form method="post" action="">
                    <?php wp_nonce_field('update-options') ?>
                    <p>
                        <label for="virtualspirits">VirtualSpirits Chatbot ID: </label>
                        <input type="text" name="virtualspirits" placeholder="" value="<?php echo esc_html(get_option('virtualspirits')); ?>" /><br><br>
                   </p>
                   <p>
                        <label for="virtualspirits_status">Action: </label>
                        <select name="virtualspirits_status">
                            <option value="Enable" <?php if(get_option('virtualspirits_status')=="Enable") echo "selected"; ?>>Enable</option>
                            <option value="Disable" <?php if(get_option('virtualspirits_status')=="Disable") echo "selected"; ?>>Disable</option>
                        </select><br>
                        <br><br>
                       	<input type="submit" class="button button-primary" name="save" value="Save Settings">
                       	<input type="hidden" name="action" value="update">
                       	<input type="hidden" name="page_options" value="virtualspirits,virtualspirits_status">
                   </p>
                   </form>
                    </div>
                </div>
        </div>
    </div>
</div><?php }