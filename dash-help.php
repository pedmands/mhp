<?php
/**
* Plugin Name: Preston's Little Helper
* Description: A simple plugin that adds welcome widget and help panel
* Version: 1.0.1
* Author: Preston Edmands
* License: GPL2
*/
// Add a custom dashboard widget

add_action( 'wp_dashboard_setup', 'help_widget' );
function help_widget() {
	wp_add_dashboard_widget(
		'help_widget',
		'Welcome',
		'help_widget_display'
	);

}

function help_widget_display() {
?>
<style>
  #help-widget p {
    margin-top:5px;
  }
  .help-title {
    font-size: 18px !important;
    margin-bottom: 5px !important;
    margin-top: 25px !important;
  }
  #help-links {
    list-style-type: square !important;
    margin-left: 20px;
  }
</style>
  <div id="help-widget">
    <p>Hi Mark, welcome to your new website. Here are some quick guidelines to keep in mind when using the site:</p>

  	<h4 class="help-title">Theme Settings</h4>
      <p>Here you can adjust the settings of various parts of the site.</p>
      <p>Under the "Theme Settings" section, you can change the colors and weight of your site title (the logo).</p>
      <p>On the "Landing Page" section, you can set the background image/color of the landing page, the colors of the intro blurb (as well as the content of the blurb), and the button background and text colors.</p>

  	<h4 class="help-title">Posts</h4>
      <p>These are your news updates/blog posts. Whenever you create a new post, make sure to add it to the <em>News</em> category, otherwise it won't appear on the front page.</p>

  	<h4 class="help-title">Media</h4>
      <p>Your media gallery is where you will upload all images and mp3 files for the Radio Production examples.</p>

  	<h4 class="help-title">Pages</h4>
      <p>On the Pages screen, you will see a list of the site's sections to which you can add new content. For more help with each page, refer to the "Publishing Help" at the top of the sidebar.</p>

  	<h4 class="help-title">Helpful Links</h4>
      <ul id="help-links">
  		<li><a href='<?php echo admin_url("post-new.php") ?>'>New Post</a></li>
  		<li><a href='<?php echo admin_url("pages.php") ?>'>Pages</a></li>
  		<li><a href='<?php echo admin_url("upload.php") ?>'>Media Gallery</a></li>
  		<li><a href='admin.php?page=theme-general-settings'>Theme Settings</a></li>
  		<li><a href='<?php echo admin_url("profile.php") ?>'>Your Profile</a></li>
  	</ul>
  </div>
    <?php
}

function help_guidelines() {

  $screen = get_current_screen();

  if ( 'post' != $screen->post_type )
    return;

  $args = array(
    'id'      => 'my_website_guide',
    'title'   => 'Content Guidelines',
    'content' => '
    	<h3>Content Guidelines</h3>
    	<p>Radio Production: Upload mp3 files.</p>
    	<p>Music for Film: Upload audio clips with still images to YouTube to use here.
    	</p>
    ',
  );

  // Add the help tab.
  $screen->add_help_tab( $args );

}

add_action('admin_head', 'help_guidelines'); ?>
