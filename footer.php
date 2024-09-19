<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package School_Theme
 */

?>

	<footer id="colophon" class="site-footer">
		<nav class="kf-custom-logo">
			<?php
				if ( function_exists( 'the_custom_logo' ) ) {
						the_custom_logo();
				}
			?>
		</nav>
		<div class="site-info">
			<p>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf('Created by <a href="https://www.fatimanassari.com/school/">Keanna Bayaua and Fatima Pournassari</a>' );
				?>
			</p>
			<p>
				<?php
					printf('Photos courtesy by <a href="https://www.shopify.com/stock-photos">Burst</a>' );
				?>
			</p>
		</div><!-- .site-info -->
		<nav id='kf-footer-navigation' class='kf-footer-navigation'>
				<h2>Links</h2>
				<?php
				wp_nav_menu(array('theme_location' => 'footer'));
				?>
			</nav>	
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
