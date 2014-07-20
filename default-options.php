<?php
/**
 * default-options.php
 */
$options = get_option('wp_sto');

if (!isset($options["input_text"])) 
	$options["input_text"] = 'input text';

if (!isset($options["input_select"])) 
	$options["input_select"] = 'option 1';

if (!isset($options["input_checkbox_1"])) 
	$options["input_checkbox_1"] = '';

if (!isset($options["input_checkbox_2"])) 
	$options["input_checkbox_2"] = '';

if (!isset($options["input_checkbox_3"])) 
	$options["input_checkbox_3"] = '';

if (!isset($options["input_radio"])) 
	$options["input_radio"] = 'radio 1';

if (!isset($options["input_textarea"])) 
	$options["input_textarea"] = 'input textarea';
