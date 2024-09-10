<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

get_header();
?>
<main id="primary" class="site-main">

<?php
while ( have_posts() ) :
  the_post();

  get_template_part( 'template-parts/content', 'page' );

  $args = array(
    'post_type'      => 'kf-staff',
    'posts_per_page' => -1,
    'order' =>'ASC',
    'orderBy' => 'title'
  );

  $query = new WP_Query($args);
  $taxonomy = 'kf-staff-type';
  $terms    = get_terms(
      array(
          'taxonomy' => $taxonomy
      )
      );

      if($terms && ! is_wp_error($terms)){
        foreach($terms as $term){
          $args = array(
            'post_type'      => 'kf-staff',
            'posts_per_page' => -1,
            'order'          =>'ASC',
            'orderBy'        => 'title',
            'tax_query'      => array(
              array(
                'taxonomy' => $taxonomy,
                'field'    => 'slug',
                'terms'    => $term->slug,
              )
            )
          );

          $query = new WP_Query( $args );
    
            // Output Term name.
            echo '<h2>' . esc_html( $term->name ) . '</h2>';
            // output content
            while($query->have_posts()){
              $query->the_post();
              ?>
              <article id="<?php the_ID();?>">
              <h3><?php the_title(); ?></h3>
              <?php
              if(function_exists('get_field')){
                // check if it has something in it
                  if(get_field('staff_biography')){
                    ?>
                    <p>
                      <?php the_field('staff_biography') ?>
                  </p>
                  <?php
                  }if(get_field('instructor_course')){
                    ?>
                    <p>
                      <?php the_field('instructor_course') ?>
                  </p>
                  <?php

                  }
                  if(get_field('instructor_website')){
                    ?>
                    <a href="<?php echo esc_url(get_field('instructor_website')); ?>">Instructor Website</a>
                    <?php
                  }
              }
              ?>
                </article>
                <?php
                  wp_reset_postdata();

            
          }
      }
    }
    ?>
  </section>
  <?php endwhile; ?>

  </main>