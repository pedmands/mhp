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
	<?php if (has_post_thumbnail() && !is_single()) {
	the_title( '<h2 class="entry-title shifty"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	<figure class="featured-image">
			<a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">
					<?php the_post_thumbnail(); ?>
			</a>
	</figure>
	<div class="article-shifter">
<?php } ?>
<?php if (get_field('soundcloud') && !is_single()){
	the_title( '<h2 class="entry-title shifty"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	$audio = get_field('soundcloud_code'); ?>
	<div class="soundcloud-embed">
	<?php echo do_shortcode($audio); ?>
	</div>
	<div class="article-shifter">
<?php } ?>
<header class="entry-header">
	<?php
	if ( is_single() && !has_post_thumbnail()) :
		the_title( '<h1 class="entry-title">', '</h1>' );
	elseif (has_post_thumbnail() || get_field('soundcloud')) :

	else :
		the_title( '<h2 class="entry-title index-excerpt"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	endif; ?>
</header><!-- .entry-header -->

<?php if (has_post_thumbnail() && is_single()) {
	the_title( '<h1 class="entry-title">', '</h1>' ); ?>
</article>
	<div class="feat-img-lg">
		<?php the_post_thumbnail(); ?>
	</div>
	<article <?php post_class(); ?>>
<?php	} ?>

<?php if( has_excerpt() && !is_single()){?>
	<div class="entry-content">
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
	<?php if (get_field('soundcloud') && is_single()){
		$audio = get_field('soundcloud_code');
		echo do_shortcode($audio); ?>
	<?php } ?>
</div><!-- .entry-content -->
	<?php } ?>

	<?php if (has_post_thumbnail() && !is_single()) { ?>
	</div><!-- .article-shifter -->
	<?php } ?>

	<?php if (get_field('soundcloud') && !is_single()) { ?>
	</div><!-- .article-shifter -->
	<?php } ?>

</article><!-- #post-## -->
