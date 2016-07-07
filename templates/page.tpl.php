<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>
<div id="page-bg"></div>

<div id="main-wrapper" class="container-fluid">

  <div id="top-page" class="container-fluid <?php if ($fixed_header == 'yes') { print 'fixed'; } ?>">

    <!-- Header region -->

    <?php if ($page['header-left'] || $page['header-right']) : ?>
      <div id="header-region">
        <div class="content-wrapper">
          <div class="row-fluid wrapper">
            <div class="span6">
              <?php if ($page['header-left']) { print render($page['header-left']); } ?>
            </div>
            <div class="span6 text-right text-center-responsive">
              <?php if ($page['header-right']) { print render($page['header-right']); } ?>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <!-- End of Header region -->

		<!-- Mobile Main menu -->
		<div id="nav-mobile" class="">
			<div class="mobile-menu-trigger close-menu">
				<i class="fa fa-times" aria-hidden="true"></i>
			</div>
			<?php if ($primary_nav): print render($primary_nav); endif; ?>
		</div>
		<!-- End of Mobile Main menu -->

    <header class="header" id="header">

      <div class="content-wrapper">
        <div class="row-fluid wrapper">
          <!-- Logo or Site name section -->
      	  <div id="logo" class="span3">

      	  <div class="mobile-menu-trigger"><i class="fa fa-bars" aria-hidden="true"></i></div>

      	  <?php if ($logo) : ?>
            	<a href="<?php print $front_page; ?>"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="logo" /></a>
            <?php elseif ($site_name) : ?>
            	<a href="<?php print $front_page; ?>" id="site-name"><h1><?php print $site_name; ?></h1></a>
            <?php endif; ?>
      	  </div>
      	  <!-- End of Logo or Site name section -->

      	  <!-- Main menu navigation section -->
      	  <div id="nav" class="span9">
      		  <div class="navbar">
      			  <div class="navbar-inner">
      				  <div class="container" data-toggle="collapse" data-target=".nav-collapse">
      					  <a class="brand">Menu</a>

      					  <nav class="nav-collapse collapse">
      					    <?php if ($primary_nav): print render($primary_nav); endif; ?>
      					  </nav>
      				  </div>
      			  </div>
      		  </div>
      	  </div>
      	  <!-- End of Main menu navigation section -->

        </div>
      </div>
    </header>

  </div>
  <!-- End of Top page -->

  <div id="page" class="container-fluid">

    <!-- Top content region -->

    <?php //if(!drupal_is_front_page() && ($page['top_content_left'] || $page['top_content_right'] || $breadcrumb_display == "yes")) : ?>
    <?php if($page['top_content_left'] || $page['top_content_right'] || ($breadcrumb_display == "yes" && $breadcrumb)) : ?>
      <div id="top-content-region">
        <div class="row-fluid wrapper">

          <?php $span_size = ($page['top_content_left'] || $breadcrumb_position === "left") && !($page['top_content_right'] || $breadcrumb_position === "right") ? 'span12' : 'span6'; ?>
          <?php $span_size = ($page['top_content_right'] || $breadcrumb_position === "right") ? 'span6' : $span_size; ?>

          <!-- Top content left region -->
          <?php if($page['top_content_left'] || ($breadcrumb_position === "left")) : ?>
            <div id="top-content-left-region" class="<?php print $span_size; ?> text-center-responsive">
              <?php if($breadcrumb_position === "left") { print $breadcrumb; } ?>
              <?php if($page['top_content_left']) { print render($page['top_content_left']); } ?>
            </div>
          <?php endif; ?>
          <!-- End of top content left region -->

          <!-- Top content right region -->
          <?php if($page['top_content_right'] || ($breadcrumb_position === "right")) : ?>
            <div id="top-content-right-region" class="<?php print $span_size; ?> text-right text-center-responsive">
              <?php if($breadcrumb_position === "right") { print $breadcrumb; } ?>
              <?php if($page['top_content_right']) { print render($page['top_content_right']); } ?>
            </div>
          <?php endif; ?>
          <!-- End of top content right region -->


        </div>
      </div>
    <?php endif; ?>

    <!-- End of Top content region -->


    <!-- Highlighted region -->

    <?php if ($page['highlighted']) : ?>
      <div id="highlighted-region">
        <div class="row-fluid wrapper">
          <div class="span12">
            <?php print render($page['highlighted']); ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <!-- End of Highlighted region -->

  	<!-- Help region -->
    <?php if ($page['help']) : ?>
      <div id="help-region">
        <div class="row-fluid wrapper">
    	    <div class="span12">

    	      <!-- Rendering of the help region -->
    	      <?php print render($page['help']); ?>

    	      <!-- Rendering of the action links -->
    	      <?php if ($action_links): ?>
              <ul class="nav nav-pills">
                <?php print render($action_links); ?>
              </ul>
            <?php endif; ?>

          </div>
    	  </div>
      </div>
    <?php endif; ?>
    <!-- End of Help region -->

  	<!-- Content, Sidebar First and Sidebar Second regions -->
    <div id="main-content">


      <?php /* if($breadcrumb_display == "yes") : ?>
      <div class="row-fluid wrapper">
        <div class="span12">
          <?php print $breadcrumb; ?>
        </div>
      </div>
      <?php endif; */ ?>

      <div class="row-fluid wrapper">
        <div class="span12">

          <?php if ($title): ?>
            <h1 class="page-title"><?php print $title; ?></h1>
          <?php endif; ?>

          <!-- Output the messages -->
  		    <?php if ($messages) { print render($messages); } ?>

  		    <!-- Rendering the tabs to view and edit nodes -->
  		    <?php if ($tabs) : ?>
  		      <?php print render($tabs); ?>
  		    <?php endif; ?>

        </div>
      </div>

      <div class="row-fluid wrapper">
        <!-- If the Sidebar First has content then it will be rendered -->
        <?php if ($page['sidebar_first']) : ?>
          <div id="sidebar-first-region" class="<?php print $sidebar_class; ?>">
            <?php print render($page['sidebar_first']); ?>
          </div>
        <?php endif; ?>
        <!-- End of Sidebar First region -->

  	    <!-- Rendering of the main content -->
  		  <div id="content-region" class="<?php print $content_class; ?>">

  		    <!-- Rendering the content -->
  		    <?php print render($page['content'])?>

  		    <!-- Printing the feed icons -->
  		    <?php print $feed_icons; ?>
  		  </div>
  		  <!-- End of the main content -->


  		  <!-- If the Sidebar Second has content then it will be rendered -->
  		  <?php if ($page['sidebar_second']) : ?>
  		    <div id="sidebar-second-region" class="<?php print $sidebar_class; ?>">
  		      <?php print render($page['sidebar_second']); ?>
  		    </div>
  		  <?php endif; ?>
  		  <!-- End of Sidebar Second region -->
      </div>

  	</div>
  	<!-- End of Content, Sidebar First and Sidebar Second regions -->


  	<?php if ($page['content_wide1']) : ?>

    <div id="content-wide1-region">
      <div class="row-fluid wrapper">
        <div class="span12">
          <?php print render($page['content_wide1']); ?>
        </div>
      </div>
    </div>

    <?php endif; ?>

  	<!-- End of Content wide 1 region -->

    <!-- Content wide 2 region -->

    <?php if ($page['content_wide2']) : ?>

    <div id="content-wide2-region">
      <div class="row-fluid wrapper">
        <div class="span12">
          <?php print render($page['content_wide2']); ?>
        </div>
      </div>
    </div>

    <?php endif; ?>

    <!-- End of Content wide 2 region -->

    <!-- Content wide 3 region -->

    <?php if ($page['content_wide3']) : ?>

    <div id="content-wide3-region">
      <div class="row-fluid wrapper">
        <div class="span12">
          <?php print render($page['content_wide3']); ?>
        </div>
      </div>
    </div>

    <?php endif; ?>

    <!-- End of Content wide 3 region -->

    <!-- Content wide 4 region -->

    <?php if ($page['content_wide4']) : ?>

    <div id="content-wide4-region">
      <div class="row-fluid wrapper">
        <div class="span12">
          <?php print render($page['content_wide4']); ?>
        </div>
      </div>
    </div>

    <?php endif; ?>

    <!-- End of Content wide 4 region -->


    <!-- Footer Columns region -->
  	<?php if ($footer_columns > 0) : ?>
  	  <div id="footer-four-columns">

  	    <div class="row-fluid wrapper">

  	      <?php if ($page['footer_firstcolumn']) : ?>
  		      <div id="footer-first-region" class="<?php print $footer_class; ?>">
  		        <?php print render($page['footer_firstcolumn']); ?>
  		      </div>
  	      <?php endif; ?>

  		    <?php if ($page['footer_secondcolumn']) : ?>
  		      <div id="footer-second-region" class="<?php print $footer_class; ?>">
  		        <?php print render($page['footer_secondcolumn']); ?>
  		      </div>
  	      <?php endif; ?>

  		    <?php if ($page['footer_thirdcolumn']) : ?>
  		      <div id="footer-third-region" class="<?php print $footer_class; ?>">
  		        <?php print render($page['footer_thirdcolumn']); ?>
  		      </div>
  	      <?php endif; ?>

  	      <?php if ($page['footer_fourthcolumn']) : ?>
  		      <div id="footer-fourth-region" class="<?php print $footer_class; ?>">
  		        <?php print render($page['footer_fourthcolumn']); ?>
  		      </div>
  	      <?php endif; ?>

  	    </div>

  	  </div>
  	<?php endif; ?>
  	<!-- End of Footer Columns region -->



  	<!-- Footer region -->
  	<footer>
  		<div class="row-fluid wrapper">

  		  <?php if ($page['footer_left']) : ?>
  			  <div id="footer-left-region" class="<?php print $last_footer_class ?>">
  		      <?php print render($page['footer_left']); ?>
  			  </div>
        <?php endif; ?>

  			<?php if ($page['footer_right']) : ?>
  		    <div id="footer-right-region" class="<?php print $last_footer_class ?>">
  		      <?php print render($page['footer_right']); ?>
  			  </div>
        <?php endif; ?>

  		</div>
    </footer>
  	<!-- End of Footer region -->

  </div>

</div>
