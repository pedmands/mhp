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
 		$video = get_sub_field('video_url');
 		$description = get_sub_field('description');
 		?>
 <article id="post-<?php the_ID(); ?>" class="hentry mff">
 		<div class="entry-content">
      <?php echo '<h1 class="entry-title top-title">' . $title . '</h1>'; ?>
 			<div class="media">
 				<?php
        if ($title === 'Serial'){
          echo '<div class="serial-player"></div>';
        } else if ($title === 'Strays') {
          echo '<div class="strays-player"></div>';
        } else if ($title === 'Bayard and Me') {
          echo '<div class="bayard-player"></div>';
        } else if ($title === 'Greenwood') {
          echo '<div class="greenwood-player"></div>';
        } else if ($title === 'The Zeno Question') {
          echo '<div class="zeno-player"></div>';
        } else if ($title === "Prophet's Prey") {
          echo '<div class="prophet-player"></div>';
        } else if ($title === 'Kingswood') {
          echo '<div class="kingswood-player"></div>';
        } else if ($title === 'Playing Politics (The Guardian)') {
          echo '<div class="guardian-player"></div>';
        } else if ($title === 'Hold On') {
          echo '<div class="hold-player"></div>';
        } else if ($title === 'An Open Secret') {
          echo '<div class="secret-player"></div>';
        } else if ($title === 'Stories Of The Mind') {
          echo '<div class="stories-player"></div>';
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
      <?php echo '<h1 class="entry-title right-title">' . $title . '</h1>'; ?>
 				<?php echo $description; ?>
 			</div><!-- .article-shifter -->
 		</div><!-- .entry-content -->

  
 </article><!-- #post-## -->
 <?php endwhile; ?>
 <?php endif; ?>
