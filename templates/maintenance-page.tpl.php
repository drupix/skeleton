<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page while offline.
 *
 * All the available variables are mirrored in html.tpl.php and page.tpl.php.
 * Some may be blank but they are provided for consistency.
 *
 * @see template_preprocess()
 * @see template_preprocess_maintenance_page()
 *
 * @ingroup themeable
 */

?>

<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php print $head; ?>
	<title><?php print $head_title; ?></title>
	<?php print $styles; ?>
	<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
	<?php print $scripts; ?>
</head>

<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  
  <div id="maintenance-page" class="container-fluid">
  
    <header>
    
      <div class="row-fluid wrapper">
        <div class="span12 text-center">
  		    <?php if ($logo) : ?>
          	<a href="<?php print $front_page; ?>"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="logo" /></a>
          <?php elseif ($site_name) : ?>
          	<a href="<?php print $front_page; ?>" id="site-name"><h1><?php print $site_name; ?></h1></a>
          <?php endif; ?>
  	    </div>
  	  </div>
  
    </header>
    
    <div id="main-content">
      
      <div class="row-fluid wrapper">
  		  <div class="span12">
  		  
  		    <div class="hero-unit text-center">
            <?php if ($title): ?>
              <h1><?php print $title; ?></h1>
            <?php endif; ?>
            <div style="padding: 35px 0px;"><i class="icon-cogs" style="font-size: 128px;"></i></div>
            <p><?php print $content; ?></p>
            <a href="mailto:<?php print $email_maintenance; ?>" class="btn btn-primary btn-large">email us</a>
          </div>
  		    
  		  </div>
  	  </div>
  	  
    </div>

  </div>
  
</body>

</html>