<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mhp
 */

 ?>
 <?php if( have_rows('mfc_examples') ): ?>
 	<?php while( have_rows('mfc_examples') ): the_row();
 		$title = get_sub_field('title');
 		$client = get_sub_field('client');
 		$video = get_sub_field('video_url');
 		?>
 		<div class="commercial">
 			<div class="media">
 				<?php
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
 				$attributes = 'frameborder="0"';
 				$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
 				// echo $iframe
 				echo $iframe;
 				?>

 			</div>
 			<div class="commercial-info">
 				<?php
 					echo "<h1 class='commercial-client'>";
 					the_sub_field('client');
 					echo "</h1>";
 					echo "<h2 class='commercial-title'>";
 					the_sub_field('title');
 					echo '</h2>';
 				?>
 			</div><!-- .commercial-info -->
 		</div><!-- .commercial -->
 	<?php endwhile; ?>
 <?php endif; ?>
