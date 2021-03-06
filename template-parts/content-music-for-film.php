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
    $videoAudio = get_sub_field('video-or-playlist');
 		$videoURL = get_sub_field('video_url');
    $audioURL = get_sub_field('soundcloud_url');
 		$description = get_sub_field('description');
 		?>
 <article id="post-<?php the_ID(); ?>" class="hentry mff">
 		<div class="entry-content">
      <?php echo '<h1 class="entry-title top-title">' . $title . '</h1>'; ?>
 			<div class="media">
 				<?php
        if ($videoAudio === 'video') {
 					// get iframe HTML
 					$iframe = $videoURL;
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
        } else {
          echo '<iframe width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=' . $audioURL . '&amp;auto_play=false&amp;visual=true&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>';
        }
 				?>
 			</div>
 			<div class="description">
      <?php echo '<h1 class="entry-title right-title">' . $title . '</h1>'; ?>
 				<?php echo $description; ?>
 			</div><!-- .article-shifter -->
 		</div><!-- .entry-content -->

  
 </article><!-- #post-## -->
 <?php endwhile; ?>
 <?php endif; ?>
