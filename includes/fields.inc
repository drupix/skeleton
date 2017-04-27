<?php

function skeleton_node_tags($node) {
   $category_arr = array();
   $category = '';
   if (!empty($node->{'field_tags'}[LANGUAGE_NONE])) {
      foreach ($node->{'field_tags'}[LANGUAGE_NONE] as $item) {
         $term = taxonomy_term_load($item['target_id']);
         if ($term) {
           $category_arr[] = l($term->name, 'taxonomy/term/' . $item['target_id']);
         }
      }
   }
   $category = implode(', ', $category_arr);

   return $category;
}
