<?php
/**
 * Implements hook_form_system_theme_settings_alter().
 *
 * @param $form
 *   Nested array of form elements that comprise the form.
 * @param $form_state
 *   A keyed array containing the current state of the form.
 */
function skeleton_form_system_theme_settings_alter(&$form, &$form_state, $form_id = NULL)  {
  //TODO: Check this
  // Work-around for a core bug affecting admin themes. See issue #943212.
  if (isset($form_id)) {
    return;
  }

  // Create the form using Forms API: http://api.drupal.org/api/7

  /* -- Delete this line if you want to use this setting
  $form['skeleton_example'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('skeleton sample setting'),
    '#default_value' => theme_get_setting('skeleton_example'),
    '#description'   => t("This option doesn't do anything; it's just an example."),
  );
  // */
  $theme_colors = array('default' => t('Default'),
	                      //'aqua'    => t('Aqua'),
	                      'blue'    => t('Blue'),
	                      /*

	                      'brown'   => t('Brown'),
		                    */
                        'green'   => t('Green'),
		                    /*
                        'orange'  => t('Orange'),
		                    'red'     => t('Red'),
		                    'yellow'  => t('Yellow'),
		                    */
                        'custom'  => t('Custom'));


  // We are editing the $form in place, so we don't need to return anything.

	$form['settings'] = array(
		'#type' => 'vertical_tabs',
		'#title' => t('Skeleton Settings'),
		'#weight' => 2,
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);

	/************************/
	/*** Colors           ***/
	/************************/
	$form['settings']['general'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('General settings'),
  	'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);
	$form['settings']['general']['layout_version'] = array(
		'#type' => 'select',
		'#title' => t('Layout Version'),
		'#options' => array('wide' => 'Wide', 'boxed' => 'Boxed'),
		'#default_value' => theme_get_setting('layout_version'),
		'#description' => t('Set the layout version of your theme.'),
	);

	$form['settings']['general']['theme_color'] = array(
		'#type' => 'select',
		'#title' => t('Theme Color'),
		'#options' => $theme_colors,
		'#default_value' => theme_get_setting('theme_color'),
		'#description' => t('Set the main color of your theme.'),
  );
	/************************/
	/*** Fixed Header     ***/
	/************************/
	$form['settings']['general']['fixed_header'] = array(
		'#type' => 'select',
		'#title' => t('Fixed Header'),
		'#options' => array(
        'yes'   => t('Yes'),
        'no'    => t('No'),
    ),
		'#default_value' => theme_get_setting('fixed_header'),
		'#description' => t('Set the Header (#top-page) fixed position.'),
  );

  /************************/
	/*** Breadcrump       ***/
	/************************/
  $form['settings']['breadcrumb_options'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('Breadcrumb settings'),
  	'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);
  $form['settings']['breadcrumb_options']['breadcrumb_display'] = array(
    '#type'          => 'select',
    '#title'         => t('Display breadcrumb'),
    '#default_value' => theme_get_setting('breadcrumb_display'),
    '#options'       => array(
                          'yes'   => t('Yes'),
                          'admin' => t('Only in admin section'),
                          'no'    => t('No'),
                        ),
  );
	$form['settings']['breadcrumb_options']['breadcrumb_position'] = array(
		'#type' => 'select',
		'#title' => t('Breadcrumb position'),
		'#default_value' => theme_get_setting('breadcrumb_position'),
    '#options' => array(
		  'none' => t('-none-'),
		  'left' => t('Left'),
		  'right' => t('Right')
		),
	);
	$form['settings']['breadcrumb_options']['breadcrumb_separator'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Breadcrumb separator'),
    '#description'   => t('Text only. Don’t forget to include spaces.'),
    '#default_value' => theme_get_setting('breadcrumb_separator'),
    '#size'          => 5,
    '#maxlength'     => 10,
  );
  $form['settings']['breadcrumb_options']['breadcrumb_home'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Show home page link in breadcrumb'),
    '#default_value' => theme_get_setting('breadcrumb_home'),
  );
  $form['settings']['breadcrumb_options']['breadcrumb_trailing'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Append a separator to the end of the breadcrumb'),
    '#default_value' => theme_get_setting('breadcrumb_trailing'),
    '#description'   => t('Useful when the breadcrumb is placed just before the title.'),
    '#states' => array(
      'disabled' => array(
        ':input[name="breadcrumb_title"]' => array('checked' => TRUE),
      ),
    ),
  );
  $form['settings']['breadcrumb_options']['breadcrumb_title'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Append the content title to the end of the breadcrumb'),
    '#default_value' => theme_get_setting('breadcrumb_title'),
    '#description'   => t('Useful when the breadcrumb is not placed just before the title.'),
  );

	/************************/
	/*** Maintenance page ***/
	/************************/
	$form['settings']['maintenance'] = array(
		'#type' => 'fieldset',
		'#title' => t('Maintenance page'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);

	$form['settings']['maintenance']['email'] = array(
		'#type' => 'fieldset',
		'#title' => t('Email settings'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);

	$form['settings']['maintenance']['email']['email_maintenance'] = array(
		'#type' => 'textfield',
		'#title' => t('Email for maintenance'),
		'#default_value' => theme_get_setting('email_maintenance'),
		'#size' => 50,
		'#maxlength' => 50,
	);


	/************************/
	/***   Google Maps    ***/
	/************************/

	$form['settings']['google_maps'] = array(
		'#type' => 'fieldset',
		'#title' => t('Google maps'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);

	$form['settings']['google_maps']['gmap_api_key'] = array(
			'#type' => 'textfield',
			'#title' => t('Google Maps API Key'),
			'#default_value' => theme_get_setting('gmap_api_key'),
			'#size' => 50,
			'#maxlength' => 50,
	);

	$form['settings']['google_maps']['latitude'] = array(
		'#type' => 'textfield',
		'#title' => t('Latitude'),
		'#default_value' => theme_get_setting('latitude'),
		'#size' => 50,
		'#maxlength' => 50,
	);

	$form['settings']['google_maps']['longitude'] = array(
		'#type' => 'textfield',
		'#title' => t('Longitude'),
		'#default_value' => theme_get_setting('longitude'),
		'#size' => 50,
		'#maxlength' => 50,
	);

	$form['settings']['google_maps']['google_zoom'] = array(
		'#type' => 'select',
		'#title' => t('Google maps zoom'),
		'#options' => array('1'  => '1',  '2'  => '2',  '3'  => '3',  '4'  => '4',  '5'  => '5',
		                    '6'  => '6',  '7'  => '7',  '8'  => '8',  '9'  => '9',  '10' => '10',
		                    '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15',
		                    '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20'),
		'#default_value' => theme_get_setting('google_zoom'),
		'#description' => t('Set the zoom for your google maps.'),
	);

	$form['settings']['google_maps']['google_title'] = array(
		'#type' => 'textfield',
		'#title' => t('Google maps title'),
		'#default_value' => theme_get_setting('google_title'),
		'#size' => 50,
		'#maxlength' => 50,
	);

	$form['settings']['google_maps']['google_description'] = array(
		'#type' => 'textarea',
		'#title' => t('Google maps description'),
		'#default_value' => theme_get_setting('google_description'),
		'#size' => 500,
		'#maxlength' => 500,
	);

}
