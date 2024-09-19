<?php
/**
 * The template for displaying Work archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php if ( have_posts() ) : ?>

    <header class="page-header">
      <?php
      // the_archive_title( '<h1 class="page-title">', '</h1>' );
      // the_archive_description( '<div class="archive-description">', '</div>' );
      ?>
      <!-- changed the title of the page -->
      <h1>The Class</h1>
    </header><!-- .page-header -->
    <?php
      $args = array(
        'post_type'      => 'kf-student',
        'posts_per_page' => -1,
        'order'          =>'ASC',
         'orderBy'        => 'title',
      );
      $taxonomy = 'kf-student-type';
      $terms    = get_terms(
        array(
          'taxonomy' => $taxonomy
        )
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
        <?php the_post_thumbnail('portrait-blog'); ?>
        <?php the_excerpt(); ?>
        <?php 
          $terms = get_the_terms(get_the_ID(), 'kf-student-type');
          if ($terms && !is_wp_error($terms)) {
            $term = reset($terms);
            $term_link = get_term_link($term);
            if (!is_wp_error($term_link)) {
              ?>
              <span>Specialty:</span>
              <?php
                echo '<a class="specialty" href="' . esc_url($term_link) . '">' . esc_html($term->name) .'</a>';
            }
        }
        ?>
        </article>
        <?php

        }
      }
    ?>
    <?php endif; ?>
</main><!-- #primary -->

<?php
get_footer();