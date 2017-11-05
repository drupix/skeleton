BUILD A THEME WITH SKELETON
---------------------------

The base Skeleton theme is designed to be easily extended by its sub-themes. You
shouldn't modify any of the CSS or PHP files in the skeleton/ folder; but instead you
should create a sub-theme of skeleton which is located in a folder outside of the
root skeleton/ folder. The examples below assume skeleton and your sub-theme will be
installed in sites/all/themes/, but any valid theme directory is acceptable
(read the sites/default/default.settings.php for more info.)

*** IMPORTANT NOTE ***
*
* In Drupal 7, the theme system caches which template files and which theme
* functions should be called. This means that if you add a new theme,
* preprocess or process function to your template.php file or add a new template
* (.tpl.php) file to your sub-theme, you will need to rebuild the "theme
* registry." See https://drupal.org/node/173880#theme-registry
*
* Drupal 7 also stores a cache of the data in .info files. If you modify any
* lines in your sub-theme's .info file, you MUST refresh Drupal 7's cache by
* simply visiting the Appearance page at admin/appearance.
*


 1. Setup the location for your new sub-theme.

    Copy the STARTERKIT folder out of the skeleton/ folder and rename it to be your
    new sub-theme. IMPORTANT: The name of your sub-theme must start with an
    alphabetic character and can only contain lowercase letters, numbers and
    underscores.

 2. Setup the basic information for your sub-theme.

    In your new sub-theme folder, rename the STARTERKIT.info.txt file to include
    the name of your new sub-theme and remove the ".txt" extension. Then edit
    the .info file by editing the name and description field.

    Then, visit your site's Appearance page at admin/appearance to refresh
    Drupal 7's cache of .info file data.

 3. Edit your sub-theme to use the proper function names.

    Edit the template.php and theme-settings.php files in your sub-theme's
    folder; replace ALL occurrences of "STARTERKIT" with the name of your
    sub-theme.

    For example, edit foo/template.php and foo/theme-settings.php and replace
    every occurrence of "STARTERKIT" with "foo".

    Rename the js/STARTERKIT.js with the name of your sub-theme and edit the
    file; replace ALL occurrences of "STARTERKIT" with the name of your
    sub-theme.

    For example, rename js/STARTERKIT.js to js/foo.js; edit the file and
    replace every occurrence of "STARTERKIT" with "foo".

    It is recommended to use a text editing application with search and
    "replace all" functionality.

 4. Set your website's default theme.

    Log in as an administrator on your Drupal site, go to the Appearance page at
    admin/appearance and click the "Enable and set default" link next to your
    new sub-theme.


Optional steps:

 5. Modify the markup in Skeleton core's template files.

    If you decide you want to modify any of the .tpl.php template files in the
    skeleton folder, copy them to your sub-theme's folder before making any changes.
    And then rebuild the theme registry.

    For example, copy skeleton/templates/page.tpl.php to foo/templates/page.tpl.php.

 6. Modify the markup in Drupal's search form.

    Copy the search-block-form.tpl.php template file from the modules/search/
    folder and place it in your sub-theme's template folder. And then rebuild
    the theme registry.

    You can find a full list of Drupal templates that you can override in the
    templates/README.txt file or https://drupal.org/node/190815

      Why? In Drupal 7 theming, if you want to modify a template included by a
      module, you should copy the template file from the module's directory to
      your sub-theme's template directory and then rebuild the theme registry.
      See the Drupal 7 Theme Guide for more info: https://drupal.org/node/173880

 7. Further extend your sub-theme.

    Discover further ways to extend your sub-theme by reading Drupal 7's Theme
    Guide online at:
      https://drupal.org/theme-guide
