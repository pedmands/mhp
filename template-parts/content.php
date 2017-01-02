<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mhp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



<header class="entry-header">
	<?php	the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
</header><!-- .entry-header -->



<?php if( has_excerpt() && !is_single()){?>
	<div class="entry-content index-excerpt">
		<?php
			the_excerpt();
		?>
	</div><!-- .entry-content -->
	<div class="continue-reading">
		<a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">
			<?php
			 printf(
					wp_kses( __( 'Continue reading %s', 'mhp_folio' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false ));
			?>
		</a>
	</div><!-- .continue-reading -->
	<?php	} else { ?>
		<div class="entry-content">
	<?php the_content( sprintf(
		/* translators: %s: Name of current post. */
		wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'mhp_folio' ), array( 'span' => array( 'class' => array() ) ) ),
		the_title( '<span class="screen-reader-text">"', '"</span>', false )
	) );

	wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mhp_folio' ),
		'after'  => '</div>',
	) );
	?>
		</div><!-- .entry-content -->
	<?php } ?>


	<script>document.addEventListener("DOMContentLoaded", function(event) {
		window.renderSerial(document.querySelector('.fp-serial-player'));

	});</script>
</article><!-- #post-## -->
