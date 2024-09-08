<?php
/**
 * The template for displaying Work archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php if ( have_posts() ) : ?>

    <header class="page-header">
      <?php
      the_archive_title( '<h1 class="page-title">', '</h1>' );
      the_archive_description( '<div class="archive-description">', '</div>' );
      ?>
    </header><!-- .page-header -->
    <?php
      $args = array(
        'post_type'      => 'kf-student',
        'posts_per_page' => -1,
      );

      $query = new WP_Query($args);
      if ($query->have_posts()){
        while($query->have_posts()){
          $query->the_post();
        ?>
        <article>
        <a href="<?php the_permalink();?>">
          <h2><?php the_title(); ?></h2>
        </a>
        <!-- should change the image size later -->
        <?php the_post_thumbnail('thumbnail'); ?>
        <?php the_excerpt(); ?>
        </article>
        <?php

        }
      }
    ?>
    <?php endif; ?>
</main><!-- #primary -->

<?php
get_footer();