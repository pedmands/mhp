<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mhp
 */

 ?>



 <article id="post-<?php the_ID(); ?>" class="hentry mff">
 	<header class="entry-header">
 		<?php
 			echo '<h1 class="entry-title">' . $title . '</h1>';
 		?>
 	</header><!-- .entry-header -->
 		<div class="entry-content">
 			<div class="sono-player">

 			</div>
 			<div class="description">
 				<?php echo $description; ?>
 			</div><!-- .article-shifter -->
 		</div><!-- .entry-content -->
    <script>document.addEventListener("DOMContentLoaded", function(event) {
      window.renderSono(document.querySelector('.sono-player'));
    });</script>

 </article><!-- #post-## -->
