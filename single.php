<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mhp
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			?>
			<div class="single-post-nav">
				<div class="prev-post">
					<?php previous_post_link(); ?>
				</div>
				<div class="next-post">
					<?php next_post_link(); ?>
				</div>
			</div><!-- single-post-nav -->
		<?php endwhile; // End of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
