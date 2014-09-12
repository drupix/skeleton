<?php


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
function SKELETON_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  SKELETON_preprocess_html($variables, $hook);
  SKELETON_preprocess_page($variables, $hook);
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
/* -- Delete this line if you want to use this function
function SKELETON_preprocess_html(&$variables, $hook) {

  global $language;

  // Add the color css
  $path = path_to_theme();
  $color = theme_get_setting('theme_color');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
  drupal_add_css($path . '/css/colors/' . $color . '.css', array('group' => CSS_THEME, 'type' => 'file', 'id' => 'themeColor'));
  drupal_add_css($path . '/css/style-responsive.css', array('group' => CSS_THEME, 'type' => 'file'));

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
/* -- Delete this line if you want to use this function
function SKELETON_preprocess_page(&$variables, $hook) {
  //$variables['sample_variable'] = t('Lorem ipsum.');
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
/* -- Delete this line if you want to use this function
function SKELETON_preprocess_node(&$variables, $hook) {
  //$variables['sample_variable'] = t('Lorem ipsum.');
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
function SKELETON_preprocess_comment(&$variables, $hook) {
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
function SKELETON_preprocess_region(&$variables, $hook) {
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
function SKELETON_preprocess_block(&$variables, $hook) {
}
// */


/**
 * Implements hook_form_alter
 */
/* -- Delete this line if you want to use this function
function SKELETON_form_alter(&$form, &$form_state, $form_id) {

}
// */

/**
 * Implements template_preprocess_maintenance_page
 */
/* -- Delete this line if you want to use this function
function SKELETON_preprocess_maintenance_page(&$variables) {
}
// */

/**
 * Implements theme_breadcrumb
 */
/* -- Delete this line if you want to use this function
function SKELETON_breadcrumb($variables) {
}
// */

/**
 * Theming the references tags
 */
/* -- Delete this line if you want to use this function
function SKELETON_field__field_tags($variables) {
}
// */

/**
 * Theming the references tags
 */
/* -- Delete this line if you want to use this function
function SKELETON_field__field_work_tags($variables) {

}
// */

/**
 * Theming the references tags
 */
/* -- Delete this line if you want to use this function
function SKELETON_field__field_equipment_tags($variables) {

}
// */
