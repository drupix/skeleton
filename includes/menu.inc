<?php

// Redefine the wrapper for the site menus
function skeleton_menu_tree($variables) {
   return '<ul class="nav">' . $variables['tree'] . '</ul>';
}

// Theming the links in the menu
function skeleton_menu_link(array $variables) {
  $element = $variables['element'];
  $link = $element['#original_link'];
  $attributes = array();
  $options = $element['#localized_options'];

  // Mark link as active.
  if ($link['in_active_trail']) {
    $attributes['class'][] = 'active';
  }

  // In the user-menu, display link as button.
  /*
  if ($link['menu_name'] == 'user-menu') {
    $attributes['class'][] = 'btn';
  }
  */

  // Build link output.
  $output = '';
  $output .= '<li' . drupal_attributes($attributes) . '>';
  $output .= l($element['#title'], $element['#href'], $options);
  $output .= '</li>';

  return $output;
}

// Theming the links in the main menu
function skeleton_menu_link__main_menu(array $variables) {
  //dpm($variables);

  $element = $variables['element'];
  $sub_menu = '';

  $link = $element['#original_link'];
  $attributes = array();
  $options = $element['#localized_options'];

  // Mark link as active.
  if ($link['in_active_trail'] || ($link['href'] == '<front>' && drupal_is_front_page())) {
    $attributes['class'][] = 'active';
  }

  // Build submenu.
  if ($link['has_children'] && $link['expanded']) {
    if ($link['depth'] == 1) {
       $attributes['class'][] = 'dropdown';
       $options['attributes']['class'][] = 'dropdown-toggle';
       //$options['attributes']['data-toggle'][] = 'dropdown';
       //$options['attributes']['data-target'][] = '#';
       $options['html'] = TRUE;
       $element['#title'] .= '<i class="icon-angle-down"></i>';
    }
    elseif ($link['depth'] > 1) {
       $attributes['class'][] = 'dropdown-submenu';
    }
    unset($element['#below']['#theme_wrappers']);
    $sub_menu = '<ul class="dropdown-menu">' . drupal_render($element['#below']) . '</ul>';
  }

  // Build link output.
  $output = '';
  $output .= '<li' . drupal_attributes($attributes) . '>';
  $output .= l($element['#title'], $element['#href'], $options);
  $output .= $sub_menu;
  $output .= '</li>';

  return $output;
}

/*
// Theming the links in the secondary menu
function skeleton_menu_link__secondary_menu(array $variables) {
  $element = $variables['element'];

  $attributes = array();
  $options = $element['#localized_options'];

  $options['attributes']['class'][] = 'btn';

  // Build link output.
  $output = '';
  $output .= '<li' . drupal_attributes($attributes) . '>';
  $output .= l($element['#title'], $element['#href'], $options);
  $output .= '</li>';

  return $output;
}
*/

// Theming the local tasks
function skeleton_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<ul class="nav nav-pills">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }

  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="nav nav-pills">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }

  return $output;
}
