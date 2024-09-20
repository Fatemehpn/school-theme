<?php
/**
 * The template for displaying all single Work post (post types)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package School_Theme
 */

get_header();
?>

<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

      
    
// Get the current post ID
$current_post_id = get_the_ID();

// Get the terms associated with the current post
$terms = wp_get_post_terms($current_post_id, 'kf-student-type');

if (!empty($terms) && !is_wp_error($terms)) {
    // Get the term IDs to use in the query
    $term_ids = wp_list_pluck($terms, 'term_id');
    $term_names = wp_list_pluck($terms, 'name');
    $term_names_list = implode(', ', $term_names);

    // Query for two other posts from the same taxonomy term(s)
    $args = array(
        'post_type' => 'kf-student',
        'posts_per_page' => 2,
        'post__not_in' => array($current_post_id), // Exclude current post
        'tax_query' => array(
            array(
                'taxonomy' => 'kf-student-type',
                'field' => 'term_id',
                'terms' => $term_ids,
            ),
        ),
    );

    $related_posts = new WP_Query($args);

    if ($related_posts->have_posts()) {
        echo '<h3>Meet Other '.esc_html($term_names_list).' students </h3>';
      
        while ($related_posts->have_posts()) {
            $related_posts->the_post();
            echo '<p><a href="' . get_permalink() . '">' . get_the_title() . '</a></p>';
        }
      
    }

    // Reset post data
    wp_reset_postdata();
}     
    endwhile;
    ?>
</main>
<?php
get_footer();