<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mhp
 */

 ?>



 <article id="post-<?php the_ID(); ?>" class="hentry">
 	<header class="entry-header">
 		<?php
 			echo '<h1 class="entry-title">' . $title . '</h1>';
 		?>
 	</header><!-- .entry-header -->
 		<div class="entry-content">
      <?php
        the_content();

        wp_link_pages( array(
          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mhp' ),
          'after'  => '</div>',
        ) );
      ?>
 		</div><!-- .entry-content -->


 </article><!-- #post-## -->
