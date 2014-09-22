<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'sample_options', 'sample_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'metrostyle' ), __( 'Theme Options', 'metrostyle' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create arrays for our select and radio options
 */
$select_options = array(
	'0' => array(
		'value' =>	'0',
		'label' => __( 'Zero', 'metrostyle' )
	),
	'1' => array(
		'value' =>	'1',
		'label' => __( 'One', 'metrostyle' )
	),
	'2' => array(
		'value' => '2',
		'label' => __( 'Two', 'metrostyle' )
	),
	'3' => array(
		'value' => '3',
		'label' => __( 'Three', 'metrostyle' )
	),
	'4' => array(
		'value' => '4',
		'label' => __( 'Four', 'metrostyle' )
	),
	'5' => array(
		'value' => '3',
		'label' => __( 'Five', 'metrostyle' )
	)
);

$radio_options = array(
	'yes' => array(
		'value' => 'yes',
		'label' => __( 'Yes', 'metrostyle' )
	),
	'no' => array(
		'value' => 'no',
		'label' => __( 'No', 'metrostyle' )
	),
	'maybe' => array(
		'value' => 'maybe',
		'label' => __( 'Maybe', 'metrostyle' )
	)
);

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'metrostyle' ) . "</h2>"; ?>
<hr/>
		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'metrostyle' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'sample_options' ); ?>
			<?php $options = get_option( 'sample_theme_options' ); ?>

			<table class="form-table">
                                <tr valign="top"><th scope="row"><h2>Header Configuration</h2></th>
					<td>
                                        <hr/>
                                    </td>
                                </tr>
				<?php
				/**
				 * A sample checkbox option
				 */
				?>
<!--				<tr valign="top"><th scope="row"><?php _e( 'A checkbox', 'metrostyle' ); ?></th>
					<td>
						<input id="sample_theme_options[option1]" name="sample_theme_options[option1]" type="checkbox" value="1" <?php checked( '1', $options['option1'] ); ?> />
						<label class="description" for="sample_theme_options[option1]"><?php _e( 'Sample checkbox', 'metrostyle' ); ?></label>
					</td>
				</tr>-->
                                

				<?php
				/**
				 * A sample text input option
				 */
				?>
                                
                                <tr valign="top"><th scope="row"><?php _e( 'P.O. Box / Address', 'metrostyle' ); ?></th>
					<td>
						<input id="sample_theme_options[pobox]" class="regular-text" type="text" name="sample_theme_options[pobox]" value="<?php esc_attr_e( $options['pobox'] ); ?>" />
						<label class="description" for="sample_theme_options[pobox]"><?php _e( 'P.O. Box Address to display in the header', 'metrostyle' ); ?></label>
					</td>
				</tr>
                                <tr valign="top"><th scope="row"><?php _e( 'Phone Number', 'metrostyle' ); ?></th>
					<td>
						<input id="sample_theme_options[phonenumber]" class="regular-text" type="text" name="sample_theme_options[phonenumber]" value="<?php esc_attr_e( $options['phonenumber'] ); ?>" />
						<label class="description" for="sample_theme_options[phonenumber]"><?php _e( 'phone number to display in the header', 'metrostyle' ); ?></label>
					</td>
				</tr>
                                <tr valign="top"><th scope="row"><?php _e( 'Support Email', 'metrostyle' ); ?></th>
					<td>
						<input id="sample_theme_options[supportemail]" class="regular-text" type="text" name="sample_theme_options[supportemail]" value="<?php esc_attr_e( $options['supportemail'] ); ?>" />
						<label class="description" for="sample_theme_options[supportemail]"><?php _e( 'Support email address to display in the header', 'metrostyle' ); ?></label>
					</td>
				</tr>
                                
				<tr valign="top"><th scope="row"><?php _e( 'Logo Path', 'metrostyle' ); ?></th>
					<td>
						<input id="sample_theme_options[logopath]" class="regular-text" type="text" name="sample_theme_options[logopath]" value="<?php esc_attr_e( $options['logopath'] ); ?>" />
						<label class="description" for="sample_theme_options[logopath]"><?php _e( 'Path to logo [inside theme /images directory]', 'metrostyle' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * A sample select input option
				 */
				?>
<!--				<tr valign="top"><th scope="row"><?php _e( 'Select input', 'metrostyle' ); ?></th>
					<td>
						<select name="sample_theme_options[selectinput]">
							<?php
								$selected = $options['selectinput'];
								$p = '';
								$r = '';

								foreach ( $select_options as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
						</select>
						<label class="description" for="sample_theme_options[selectinput]"><?php _e( 'Sample select input', 'metrostyle' ); ?></label>
					</td>
				</tr>-->

				<?php
				/**
				 * A sample of radio buttons
				 */
				?>
<!--				<tr valign="top"><th scope="row"><?php _e( 'Radio buttons', 'metrostyle' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Radio buttons', 'metrostyle' ); ?></span></legend>
						<?php
							if ( ! isset( $checked ) )
								$checked = '';
							foreach ( $radio_options as $option ) {
								$radio_setting = $options['radioinput'];

								if ( '' != $radio_setting ) {
									if ( $options['radioinput'] == $option['value'] ) {
										$checked = "checked=\"checked\"";
									} else {
										$checked = '';
									}
								}
								?>
								<label class="description"><input type="radio" name="sample_theme_options[radioinput]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> /> <?php echo $option['label']; ?></label><br />
								<?php
							}
						?>
						</fieldset>
					</td>
				</tr>-->

				<?php
				/**
				 * A sample textarea option
				 */
				?>
<!--				<tr valign="top"><th scope="row"><?php _e( 'A textbox', 'metrostyle' ); ?></th>
					<td>
						<textarea id="sample_theme_options[sometextarea]" class="large-text" cols="50" rows="10" name="sample_theme_options[sometextarea]"><?php echo esc_textarea( $options['sometextarea'] ); ?></textarea>
						<label class="description" for="sample_theme_options[sometextarea]"><?php _e( 'Sample text box', 'metrostyle' ); ?></label>
					</td>
				</tr>-->
                                <tr valign="top"><th scope="row"><?php _e( 'Footer - About Us', 'metrostyle' ); ?></th>
					<td>
						<textarea id="sample_theme_options[aboutus]" class="large-text" cols="50" rows="10" name="sample_theme_options[aboutus]"><?php echo esc_textarea( $options['aboutus'] ); ?></textarea>
					</td>
				</tr>
                                
                                
                                
                                
                                
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'metrostyle' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $radio_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );

	// Say our text option must be safe text with no HTML tags
	$input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['selectinput'], $select_options ) )
		$input['selectinput'] = null;

	// Our radio option must actually be in our array of radio options
	if ( ! isset( $input['radioinput'] ) )
		$input['radioinput'] = null;
	if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
		$input['radioinput'] = null;

	// Say our textarea option must be safe text with the allowed tags for posts
	$input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/