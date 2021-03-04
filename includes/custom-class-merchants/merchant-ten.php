<?php

    // require_once( KKD_PFF_RAVE_PLUGIN_PATH.'includes/admin.php');

    class MerchantTen extends Kkd_Pff_Rave_Admin
    {
        public function __construct( $plugin_name, $version ) {

		    	$this->plugin_name = $plugin_name;
		    	$this->version = $version;
		    	add_action('admin_menu', 'kkd_pff_rave_add_settings_page_m10');
		    	add_action('admin_init', 'kkd_pff_rave_register_setting_page_m10');
            	
		    	function kkd_pff_rave_add_settings_page_m10() {
		    		add_submenu_page('edit.php?post_type=rave_form', 'Merchant 10 Settings', 'Merchant 10 Settings', 'edit_posts', basename(__FILE__), 'kkd_pff_rave_setting_page_m10');
		    	}
        	
		    	function kkd_pff_rave_register_setting_page_m10() {
                    register_setting( 'kkd-pff-rave-settings-group-m10', 'rave_mode_10' );
		    		register_setting( 'kkd-pff-rave-settings-group-m10', 'rave_sandbox_public_key_10' );
		    		register_setting( 'kkd-pff-rave-settings-group-m10', 'rave_sandbox_secret_key_10' );
		    		register_setting( 'kkd-pff-rave-settings-group-m10', 'rave_live_public_key_10' );
		    		register_setting( 'kkd-pff-rave-settings-group-m10', 'rave_live_secret_key_10' );
		    		register_setting( 'kkd-pff-rave-settings-group-m10', 'rave_recurring_live_public_key_10' );
		    		register_setting( 'kkd-pff-rave-settings-group-m10', 'rave_recurring_live_secret_key_10' );
		    	}
        	
		    	function kkd_pff_rave_setting_page_m10() {
		    		?>
		    				<h1>Rave Forms API keys settings</h1>
			
        		
        	<h3>Get your Live and Test API keys <a href="https://rave.flutterwave.com" target="_blank">here</a></h3>

			<form method="post" action="options.php">
				<?php 
					settings_fields( 'kkd-pff-rave-settings-group-m10' ); 
					do_settings_sections( 'kkd-pff-rave-settings-group-m10' ); 
				?>
				<table class="form-table rave_setting_page">
					<tr valign="top">
						<th scope="row">Mode</th>
						<td>
							<select class="form-control" name="rave_mode_10" id="parent_id">
								<option value="sandbox" <?php echo kkd_pff_rave_check_selected('sandbox',esc_attr( get_option('rave_mode_10') )) ?>>Sandbox Mode</option>
								<option value="live" <?php echo kkd_pff_rave_check_selected('live',esc_attr( get_option('rave_mode_10') )) ?>>Live Mode</option>
							</select>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Test Public Key</th>
						<td>
							<input type="text" name="rave_sandbox_public_key_10" value="<?php echo esc_attr( get_option('rave_sandbox_public_key_10') ); ?>" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Test Secret Key</th>
						<td><input type="text" name="rave_sandbox_secret_key_10" value="<?php echo esc_attr( get_option('rave_sandbox_secret_key_10') ); ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row">Live Public Key</th>
						<td>
							<input type="text" name="rave_live_public_key_10" value="<?php echo esc_attr( get_option('rave_live_public_key_10') ); ?>" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Live Secret Key</th>
						<td><input type="text" name="rave_live_secret_key_10" value="<?php echo esc_attr( get_option('rave_live_secret_key_10') ); ?>" /></td>
					</tr>
				</table>

			    <?php submit_button(); ?>

			</form>
		    		<?php
		    	}
        	
        	
        }   	
    	
    }
?>