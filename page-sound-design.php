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
<main id="main" class="site-main sd" role="main">
	<h1 class="page-title">Sound Design</h1>
  <div class="intro">
    <?
      if (have_posts()):
        while (have_posts()) : the_post();
          the_content();
        endwhile;
      endif;
    ?>
  </div>
  <?php if( have_rows('sd_examples') ): ?>
  	<ul class="sd-examples">
  	<?php while( have_rows('sd_examples') ): the_row();
  		$image = get_sub_field('thumbnail');
      $title = get_sub_field('title');
      $subtitle = get_sub_field('subtitle');
  		$roles = get_sub_field('roles');
  		?>
  		<li class="sd-example">
        <div class="thumb">
          <div class="img-wrap">
				  <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" />
          </div>
        </div>
  			<div class="content">
  		    <h3 class="ex-title"><?php echo $title; ?></h3>
          <ul class="roles">
          <?php foreach ($roles as $role) {
            echo '<li>' . $role . '</li>';
          }; ?>
          </ul>
          <span class="awards-lg"><?php the_sub_field('awards'); ?></span>
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
