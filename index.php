<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mhp
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<?php if(is_front_page() && !is_paged()) { ?>
			<?php if(get_field('add_bg_img','options')){ ?>
	<style>
	#welcome {
		background-image:url(<?php the_field('bg_img','options');?>);
		background-attachment: scroll;
		background-repeat:<?php the_field('repeat','options');?>;
		background-position:<?php the_field('position','options');?>;
	}
	</style>
	<?php } ?>
			<section id="welcome"
			style="
			background-color:<?php the_field('landing_bgc','options');?>;
			">
				<div class="intro-wrap">
					<?php
					$hexColor = get_field('blurb_bg','options');
					$rgbColor = hex2rgb($hexColor);
					$finalColor = implode(", ", $rgbColor);
					if (get_field('add_blurb_bg','options')){ ?>
					<style>
					.intro-blurb {
						background-color:rgba( <?php echo $finalColor;?>, <?php the_field('blurb_bg_opacity','options');?>);
						<?php if(get_field('blurb_border','options')){?>
						border-top: 3px solid rgba(255,255,255,.15);
						border-left: 3px solid rgba(255,255,255,.15);
						border-bottom: 3px solid rgba(0,0,0,.3);
						border-right: 3px solid rgba(0,0,0,.3);
						<?php } ?>
					}
					</style>
					<?php } ?>

					<div class="intro-blurb" style="color:<?php the_field('blurb_color','options');?>;">
						<?php the_field('intro_blurb', 'option');?>
					</div>
				</div><!-- intro-wrap -->
				<div class="work-wrap">

			<ul id="frontpage-menu">
			
			<li><a href="music-for-film/"><img src="http://gladdata.design/mark/wp-content/themes/mhp/assets/icons/mff.png"><span>Music for Film</span></a></li>
			<li><a href="music-for-commercials/"><img src="http://gladdata.design/mark/wp-content/themes/mhp/assets/icons/mfc.png"><span>Music for Commercials</span></a></li>
			<li><a href="music-for-listening/"><img src="http://gladdata.design/mark/wp-content/themes/mhp/assets/icons/mfl.png"><span>Music for Listening</span></a></li>
			<li><a href="sound-design/"><img src="http://gladdata.design/mark/wp-content/themes/mhp/assets/icons/sd.png"><span>Sound Design</span></a></li>
			<li><a href="radio-production/"><img src="http://gladdata.design/mark/wp-content/themes/mhp/assets/icons/rp.png"><span>Radio Production</span></a></li>
			</ul>
				</div><!-- work-wrap -->
			</section><!-- #welcome -->
		<?php } ?>

		<main id="main" class="site-main front" role="main">
		<h1 class="fp-title">The Latest</h1>
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			?>
			<div class="post-navigation">
					<div class="nav-links">
				<div class="nav-next"><?php previous_posts_link( 'Newer Entries &raquo;' ); ?></div>
				<div class="nav-previous"><?php next_posts_link( '&laquo; Older Entries', '' ); ?></div>
			</div>
		</div><?php

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
