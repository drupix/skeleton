SKELETON'S STYLESHEETS
----------------------

ORDER AND PURPOSE OF DEFAULT STYLESHEETS
----------------------------------------

First off, if you find you don't like this organization of stylesheets, you are
free to change it; simply edit the @import declarations in your sub-theme's
styles.css file. This structure was crafted based on several years of experience
theming Drupal websites.

- styles.css:
  This is the only CSS file listed in your sub-theme's .info file. Its purpose
  is to @include all the other stylesheets in your sub-theme. When CSS
  aggregation is off, this file will be loaded by web browsers first before they
  begin to load the @include'd stylesheets; this results in a delay to load all
  the stylesheets, a serious front-end performance problem. However, it does
  make it easy to debug your website during development. To remove this
  performance problem, turn on Drupal's CSS aggregation after development is
  completed. See the note above about "Bandwidth Optimization".

- normalize.css:
  This is the place where you should set the default styling for all HTML
  elements and standardize the styling across browsers. If you prefer a specific
  HTML reset method, feel free to use it instead of normalize; just make sure
  you set all the styles for all HTML elements after you reset them. In SMACSS,
  this file contains all the "base rules". http://smacss.com/book/type-base

- layouts/responsive.css:
  Skeleton's default layout is based on the Zen Grids layout method.
  Zen Grids is an intuitive, flexible grid system that leverages the
  natural source order of your content to make it easier to create fluid
  responsive designs. You can learn more about Zen Grids at http://zengrids.com

  The responsive.css file is used by default, but these files are
  designed to be easily replaced. If you are more familiar with a different CSS
  layout method, such as GridSetApp, 960.gs, etc., you can replace the default
  layout with your choice of layout CSS file.

  In SMACSS, this file contains the "layout rules".
  http://smacss.com/book/type-layout

- components/misc.css:
  This file contains some common component styles needed for Drupal, such as:
  - Tabs: contains actual styling for Drupal tabs, a common Drupal element that
    is often neglected by site designers. Skeleton provides some basic styling which
    you are free to use or to rip out and replace.
  - Various page elements: page styling for the markup in page.tpl.php.
  - Blocks: styling for the markup in block.tpl.php.
  - Menus: styling for your site's menus.
  - Comments: styling for the markup in comment-wrapper.tpl.php and
    comments.tpl.php.
  - forms: styling for the markup in various Drupal forms.
  - fields: styling for the markup produced by theme_field().

  In SMACSS, this file contains "module rules". You can add additional files
  if you'd like to further refine your stylesheet organization. Just add them
  to the styles.css file. http://smacss.com/book/type-layout

- print.css:
  The print styles for all markup.

  In SMACSS, this file contains a media query state that overrides modular
  styles. This means it most closely related to "module rules".
  http://smacss.com/book/type-module

In these stylesheets, we have included just the classes and IDs needed to apply
a minimum amount of styling.
