<?php

$theme_path = drupal_get_path('theme', 'skeleton');
require_once $theme_path . '/includes/menu.inc'; //This include is important to add desired classes to the menus
require_once $theme_path . '/includes/fields.inc';

/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function skeleton_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  skeleton_preprocess_html($variables, $hook);
  skeleton_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
//* -- Delete this line if you want to use this function
function skeleton_preprocess_html(&$variables, $hook) {
  global $language;
  global $custom_theme, $theme, $user;

  $fixed_header = theme_get_setting('fixed_header');
  if ($fixed_header == 'yes') {
    $variables['classes_array'][] = 'fixed-header';
  }

  if (!empty($user->theme)) {
  	$current_theme = $user->theme;
  }
  elseif (!empty($custom_theme)) {
  	$current_theme = $custom_theme;
  }
  else {
  	$current_theme = $theme ? $theme : variable_get('theme_default', 'garland');
  }
  
  $color = theme_get_setting('theme_color');
  $layout_version = theme_get_setting('layout_version');

  //if ($GLOBALS['theme'] == 'skeleton') {

    /**** Add the color css ****/
    //$path = path_to_theme();
  	//$color = theme_get_setting('theme_color');
  	$path = drupal_get_path('theme', $current_theme);
    

    // The body tag's classes are controlled by the $classes_array variable. To
    // remove a class from $classes_array, use array_diff().
    //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));

    drupal_add_css($path . '/css/colors/' . $color . '.css', array('group' => CSS_THEME, 'type' => 'file', 'id' => 'themeColor'));
    drupal_add_css($path . '/css/style-responsive.css', array('group' => CSS_THEME, 'type' => 'file'));
  //}

  // passing variables to the javascript files
  $google_apikey      = theme_get_setting('gmap_api_key');
  $google_latitude    = theme_get_setting('latitude');
  $google_longitude   = theme_get_setting('longitude');
  $google_zoom        = theme_get_setting('google_zoom');
  $google_title       = theme_get_setting('google_title');
  $google_description = theme_get_setting('google_description');

  $settings = array('theme_color' => $color,
                    'layout_version' => $layout_version,
                    'google_latitude'    => $google_latitude,
                    'google_longitude'   => $google_longitude,
                    'google_zoom'        => $google_zoom,
                    'google_title'       => $google_title,
                    'google_description' => $google_description);

  drupal_add_js(array("settings" => $settings), 'setting');

  // external javascript for google maps
  if(arg(0)=='contact') {
  	$apikey_str = '';
  	if($google_apikey) {
  		$apikey_str = '&key=' . $google_apikey;
  	}

  	if ($GLOBALS['is_https']) {
  		$proto = 'https://';
  	}
  	else {
  		$proto = 'http://';
  	}
  	//drupal_add_js('http://maps.google.com/maps/api/js?sensor=false&language=' . $language->language . $apikey_str, 'external');
  	drupal_add_js($proto . 'maps.google.com/maps/api/js?&language=' . $language->language . $apikey_str, 'external');
  }

}

// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
//* -- Delete this line if you want to use this function
function skeleton_preprocess_page(&$variables, $hook) {
  //$variables['sample_variable'] = t('Lorem ipsum.');

  /**** General variables ****/
  $variables['fixed_header'] = theme_get_setting('fixed_header');
  $variables['breadcrumb_display'] = theme_get_setting('breadcrumb_display');
  $variables['breadcrumb_position'] = theme_get_setting('breadcrumb_position');

  /**** Creating the main menu and secondary tree ****/
  $variables['primary_nav'] = FALSE;
  $variables['mobile_nav'] = FALSE;
	if ($variables['main_menu']) {
		$variables['primary_nav'] = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
		$variables['mobile_nav'] = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
	}

	$variables['secondary_nav'] = FALSE;
	if ($variables['secondary_menu']) {
		$variables['secondary_nav'] = menu_tree(variable_get('menu_secondary_links_source', 'user-menu'));
	}

	/**** Configuring the classes for the Sidebars and Content regions ****/
	$variables['sidebar_class'] = 'span3';
	$variables['content_class'] = 'span6';
	if (($variables['page']['sidebar_first'] && !$variables['page']['sidebar_second']) ||
	    (!$variables['page']['sidebar_first'] && $variables['page']['sidebar_second'])) {
	   $variables['content_class'] = 'span9';
	} elseif (!$variables['page']['sidebar_first'] && !$variables['page']['sidebar_second']) {
	   $variables['content_class'] = 'span12';
	}

	/**** Configuring the classes for the Footers columns ****/
	//Define variables for easy code writing to calculate the classes for the Footer columns
	$f_first = $variables['page']['footer_firstcolumn'];
	$f_second = $variables['page']['footer_secondcolumn'];
	$f_third = $variables['page']['footer_thirdcolumn'];
	$f_fourth = $variables['page']['footer_fourthcolumn'];

	$footer_columns = 0;

	if ($f_first) { $footer_columns++; }
	if ($f_second) { $footer_columns++; }
	if ($f_third) { $footer_columns++; }
	if ($f_fourth) { $footer_columns++; }

	switch ($footer_columns) {
	   case 1: $variables['footer_class'] = 'span12'; break;
	   case 2: $variables['footer_class'] = 'span6'; break;
	   case 3: $variables['footer_class'] = 'span4'; break;
	   case 4: $variables['footer_class'] = 'span3'; break;
	   default: $variables['footer_class'] = 'span3';
	}

	$variables['footer_columns'] = $footer_columns;

	/**** Footer variables from the theme settings ****/
	$variables['last_footer_class'] = 'span6';

	$footer_left = $variables['page']['footer_left'];
	$footer_right = $variables['page']['footer_right'];

	if (!$footer_left || !$footer_right) { $variables['last_footer_class'] = 'span12'; }

}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
//* -- Delete this line if you want to use this function
function skeleton_preprocess_node(&$variables, $hook) {
  //$variables['sample_variable'] = t('Lorem ipsum.');

  $node = $variables['node'];
  $variables['date'] = format_date($node->created);

  $variables['field_image_class'] = 'span12';
  if (!empty($node->{'field_image'})) {
    $variables['field_image_class'] = 'span7';
  }

  if (variable_get('node_submitted_' . $node->type, TRUE)) {
    $variables['display_submitted'] = TRUE;

    $date = format_date($node->created, 'custom', 'j M Y');
    $user = theme('username', array('account' => $node));

    $variables['submitted'] = '<ul class="submitted">';
    $variables['submitted'] .= '<li><i class="icon-calendar"></i> ' . $date . '</li>';
    $variables['submitted'] .= '<li><i class="icon-user"></i> ' . $user . '</li>';

    if (!empty($node->{'field_tags'})) {
      $tags = skeleton_node_tags($node);
      $variables['submitted'] .= '<li><i class="icon-tags"></i> ' . $tags . '</li>';
    }

    if ($node->comment == COMMENT_NODE_OPEN) {
      $comments = $node->comment_count . t(' comments');
      $variables['submitted'] .= '<li><i class="icon-comment"></i> ' . $comments . '</li>';
    }

    $variables['submitted'] .= '</ul>';
  } else {
    $variables['display_submitted'] = FALSE;
    $variables['submitted'] = '';
  }



  // Optionally, run node-type-specific preprocess functions, like
  // skeleton_preprocess_node_page() or skeleton_preprocess_node_story().
  /*
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
  */

}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function skeleton_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function skeleton_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function skeleton_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */


/**
 * Implements hook_form_alter
 */
function skeleton_form_alter(&$form, &$form_state, $form_id) {

  /* Button submit for most forms */
  if (!empty($form['actions']['submit'])) {
    $form['actions']['submit']['#attributes']['class'] = array('btn btn-primary');
  }

  if ($form['#id'] == 'contact-site-form') {
    if (!empty($form['mail'])) {
      $form['name']['#attributes']['class'] = array('large-input');
    }

    if (!empty($form['mail'])) {
      $form['mail']['#attributes']['class'] = array('large-input');
    }

    if (!empty($form['subject'])) {
      $form['subject']['#attributes']['class'] = array('large-input');
    }

    if (!empty($form['message'])) {
      $form['message']['#prefix'] = '<div class="extra-large-input">';
      $form['message']['#suffix'] = '</div>';
    }
  }


  if ($form['#id'] == 'search-block-form') {
    if (!empty($form['actions']['submit'])) {
      $form['search_block_form']['#attributes']['placeholder'] = t('Search...');
      $form['actions']['submit']['#value'] = '';
    }
  }

}

/**
 * Implements template_preprocess_maintenance_page
 */
function skeleton_preprocess_maintenance_page(&$variables) {
  $path = path_to_theme();
  $color = theme_get_setting('theme_color');
  drupal_add_css($path . '/css/colors/' . $color . '.css', array('group' => CSS_THEME, 'type' => 'file'));
  drupal_add_css($path . '/css/style-responsive.css', array('group' => CSS_THEME, 'type' => 'file'));

  $variables['email_maintenance'] = theme_get_setting('email_maintenance');
}

/**
 * Implements theme_breadcrumb
 */
function skeleton_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  $display = theme_get_setting('breadcrumb_display');
  $delimiter = theme_get_setting('breadcrumb_separator');
  $page_title = theme_get_setting('breadcrumb_title');
  if($page_title) {
    $breadcrumb[]= drupal_get_title();
  }

  $output = "";

  if (!empty($breadcrumb) && ($display=='yes')) {
    $output = '<div class="breadcrumb">'. implode($delimiter, $breadcrumb) . '</div>';
  }

  return $output;
}

/**
 * Theming the references tags
 */
function skeleton_field__field_tags($variables) {

  $output = '<ul class="submitted"><li><i class="icon-tags"></i></li>';

  foreach ($variables['items'] as $delta => $item) {
    $output .= '<li>' . drupal_render($item) . '</li>';
  }

  $output .= '</ul>';

  return $output;
}
