<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mhp
 */

 get_header(); ?>

 <div id="primary" class="content-area">
   <main id="main" class="site-main" role="main">
   <h1 class="page-title">Music for Listening</h1>

       <?php
       /* Start the Loop */
       while ( have_posts() ) : the_post();

         /*
          * Include the Post-Format-specific template for the content.
          * If you want to override this in a child theme, then include a file
          * called content-___.php (where ___ is the Post Format name) and that will be used instead.
          */
         get_template_part( 'template-parts/content', 'music-for-listening' );

       endwhile; ?>


   </main><!-- #main -->
 </div><!-- #primary -->

 <?php
 get_sidebar();
 get_footer();
