<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mhp
 */

 ?>

 <?php if( have_rows('film_examples') ): ?>
 	<?php while( have_rows('film_examples') ): the_row();
 		$title = get_sub_field('title');
 		$roles = get_sub_field('roles');
 		$audio = get_sub_field('audio_code');
 		$video = get_sub_field('video_url');
 		$description = get_sub_field('description');
 		?>
 <article id="post-<?php the_ID(); ?>" class="hentry mff">
 	<header class="entry-header">
    <?php echo '<h1 class="entry-title">' . $title . '</h1>'; ?>
 	</header><!-- .entry-header -->
 		<div class="entry-content">
 			<div class="media">
 				<?php
        if ($title === 'Serial'){
          echo '<div class="serial-player"></div>';
        } else if ($title === 'Strays') {
          echo '<div class="strays-player"></div>';
        } else {
 					// get iframe HTML
 					$iframe = $video;
 					// use preg_match to find iframe src
 					preg_match('/src="(.+?)"/', $iframe, $matches);
 					$src = $matches[1];
 					// add extra params to iframe src
 					$params = array(
 					    'controls'    => 0,
 					    'hd'        => 1,
 					    'autohide'    => 1,
 							'showinfo' => 0,
 							'modestbranding' => 1,
 							'rel' => 0,
 							'controls' => 2
 					);
 					$new_src = add_query_arg($params, $src);
 					$iframe = str_replace($src, $new_src, $iframe);
 					// add extra attributes to iframe html
 					$attributes = 'frameborder="0" class="youtube-vid"';
 					$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
 					// echo $iframe
 					echo $iframe;

 				}
 				?>
 			</div>
 			<div class="description">
        <?php

          echo '<ul class="roles">';
            foreach($roles as $role){
              echo '<li>' . $role . '</li>';
            }
          echo '</ul>';
     		?>
 				<?php echo $description; ?>
 			</div><!-- .article-shifter -->
 		</div><!-- .entry-content -->

    <script>document.addEventListener("DOMContentLoaded", function(event) {
      window.renderSerial(document.querySelector('.serial-player'));
      window.renderStrays(document.querySelector('.strays-player'));
    });</script>
 </article><!-- #post-## -->
 <?php endwhile; ?>
 <?php endif; ?>
