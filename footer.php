<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mhp
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo" style="background-color:<?php the_field('footer_bg','options');?>;">
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu', 'menu_class' => 'footer-menu' ) ); ?>
			<div class="site-info">
				Copyright 2017 Mark Henry Phillips
			</div><!-- .site-info -->
			<div class="plug">
				WordPress theme by <a href="mailto:pedmands@gmail.com">Preston Edmands</a> @ <a href="http://gladdata.design/">GladData</a>.
			</div>
		</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
