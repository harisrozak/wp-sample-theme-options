<style type="text/css">
	input[type='text'], select, textarea {
		width: 300px;
	}

	textarea {
		height: 100px;
	}
</style>

<div class="wrap">
	<h2>Sample Theme Options</h2>
	<p>Use the shortcode or do_shotcode function to print the option, for example: <code>[wp_sto name="input_text"]</code></p>	

	<?php 
		/**
		 * saved notification
		 */
		if(isset($_REQUEST['settings-updated']) && $_REQUEST['settings-updated']==true) {
		    echo "<div id='message' class='updated'><p><strong>Settings saved</strong></p></div>";
		} 
	?>

	<form method="post" action="options.php"> 
		<?php 
			/**
			 * load settings field
			 * load saved / default options
			 */
			settings_fields('wp_sto_options');
			require_once( plugin_dir_path( __FILE__ ) . 'default-options.php');
		?>

		<table class="form-table">
			<tr>
				<th>Text</th>
				<td><input type="text" name="wp_sto[input_text]" value="<?php echo $options['input_text'] ?>"></td>
			</tr>
			<tr>
				<th>Select</th>
				<td>
					<?php 
						$arr_data = array(									
							'0' => array(
								'value' =>	'option 1',
								'label' =>  '1st option' 
							),
							'1' => array(
								'value' =>	'option 2',
								'label' =>  '2nd option'
							),
							'2' => array(
								'value' =>	'option 3',
								'label' =>  '3rd option'
							)
						);

						wp_sto_print_select($arr_data,"wp_sto[input_select]",$options['input_select']);
					?>
				</td>
			</tr>
			<tr>
				<th>Checkbox</th>
				<td>
					<?php 
						$arr_data = array(									
							'0' => array(
								'name' =>	'wp_sto[input_checkbox_1]',
								'value' =>	'checkbox 1',
								'label' =>  '1st checkbox',
								'saved_value' => $options['input_checkbox_1']
							),
							'1' => array(
								'name' =>	'wp_sto[input_checkbox_2]',
								'value' =>	'checkbox 2',
								'label' =>  '2nd checkbox',
								'saved_value' => $options['input_checkbox_2']
							),
							'2' => array(
								'name' =>	'wp_sto[input_checkbox_3]',
								'value'	=>	'checkbox 3',
								'label'	=>  '3rd checkbox',
								'saved_value' => $options['input_checkbox_3']
							)
						);

						wp_sto_print_checkbox($arr_data);
					?>
				</td>
			</tr>
			<tr>
				<th>Radio</th>
				<td>
					<?php 
						$arr_data = array(									
							'0' => array(
								'value' =>	'radio 1',
								'label' =>  '1st radio' 
							),
							'1' => array(
								'value' =>	'radio 2',
								'label' =>  '2nd radio'
							),
							'2' => array(
								'value' =>	'radio 3',
								'label' =>  '3rd radio'
							)
						);

						wp_sto_print_radio($arr_data,"wp_sto[input_radio]",$options['input_radio']);
					?>
				</td>
			</tr>
			<tr>
				<th>Textarea</th>
				<td><textarea name="wp_sto[input_textarea]"><?php echo $options['input_textarea'] ?></textarea></td>
			</tr>
			<tr>
				<th colspan="2">
					<input type="submit" class="button button-primary" value="Save Options" >
				</th>
			</tr>
		</table>
	</form>
</div>