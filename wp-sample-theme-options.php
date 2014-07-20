<?php
/**
 * Plugin Name: Sample Theme Options
 * Plugin URI: 
 * Description: Sample WordPress Theme Options Page
 * Version: 1.0
 * Author: Haris Ainur Rozak
 * Author URI: https://github.com/harisrozak
 * -----------
 * 
 * we have cut short the variable name 'wp_sample_theme_option' to 'wp_sto' 
 */

/**
 * admin menu
 */
add_action( 'admin_menu', 'wp_sto_menu' );
function wp_sto_menu() 
{	
	add_menu_page('Sample Theme Options','Sample Theme Options','moderate_comments','wp-sample-theme-options/admin-page.php');
}

/**
 * Init plugin options to white list our options
 */
add_action( 'admin_init', 'wp_sto_admin_init' );
function wp_sto_admin_init()
{
	register_setting( 'wp_sto_options', 'wp_sto' );
}

/**
 * shortcode options output
 */
add_shortcode('wp_sto', 'wp_sto_print');
function wp_sto_print($attr)
{
	/**
	 * load saved / default options
	 * in this shortcode, use 'include' to load 'default-options.php'
	 */
	include( plugin_dir_path( __FILE__ ) . 'default-options.php');

	return $options[$attr['name']];
}

/**
 * print form element functions
 */
function wp_sto_print_select($arr_data, $name, $value)
{
	$print_select = "";
	$print_select.= "<select name='$name'>";

	foreach ($arr_data as $data) 
	{
		$selected = $data['value'] == $value ? 'selected' : '';

		$print_select.= "<option value='{$data['value']}' $selected >{$data['label']}</option>";
	}

	$print_select.= "</select>";

	echo $print_select;
}

function wp_sto_print_radio($arr_data, $name, $value)
{
	$print_select = "";

	foreach ($arr_data as $data) 
	{
		$selected = $data['value'] == $value ? 'checked' : '';

		$print_select.= "<input type='radio' name='$name' value='{$data['value']}' $selected > {$data['label']}<br>";
	}

	echo $print_select;
}

function wp_sto_print_checkbox($arr_data)
{
	$print_select = "";

	foreach ($arr_data as $data) 
	{
		$selected = $data['value'] == $data['saved_value'] ? 'checked' : '';

		$print_select.= "<input type='checkbox' name='{$data['name']}' value='{$data['value']}' $selected > {$data['label']}<br>";
	}

	echo $print_select;
}