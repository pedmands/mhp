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
 <main id="main" class="site-main rp" role="main">
 	<h1 class="page-title">Radio Production</h1>

   <div class="intro">
     <?
       if (have_posts()):
         while (have_posts()) : the_post();
           the_content();
         endwhile;
       endif;
     ?>
   </div>

   <?php if( have_rows('radio_examples') ): ?>
   	<ul class="sd-examples">
   	<?php while( have_rows('radio_examples') ): the_row();
   		$image = get_sub_field('thumbnail');
       $title = get_sub_field('title');
       $subtitle = get_sub_field('subtitle');
   		$roles = get_sub_field('roles');

   		?>
   		<li class="sd-example">
         <div class="thumb">
           <div class="img-wrap">

             <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>"/>
           </div>
         </div>
   			<div class="content">
   		    <h3 class="ex-title"><?php echo $title; ?></h3>
           <h4 class="subtitle"><?php echo $subtitle; ?></h4>
           <ul class="roles">
           <?php foreach ($roles as $role) {
             echo '<li>' . $role . '</li>';
           }; ?>
           </ul>
 					<style>
 					.mejs-time-current {
 		        background: <?php the_field('track_color','options'); ?> !important;
 		      }
 					</style>
 					<?php if(have_rows('audio_samples')) {
 						while(have_rows('audio_samples')) : the_row();
 						echo "<h5 class='sample-title'>";
 						echo the_sub_field('title');
 						echo "</h5>";
 						echo do_shortcode('[sc_embed_player_template1 fileurl="' . get_sub_field('audio_file') . '"]');
 					endwhile;
 					}
 				 ?>
         </div> <!-- content -->
   		</li>
   	<?php endwhile; ?>
   	</ul>
 <?php endif; ?>




 		</main><!-- #main -->
 	</div><!-- #primary -->

 <?php
 get_sidebar();
 get_footer();
