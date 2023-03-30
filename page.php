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
 * @package unreal-themes
 */

get_header();

	// echo '<div class="b_block section border20">';

		while ( have_posts() ) :
			the_post();
			the_content();
			// get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.

	// echo '</div>';

get_footer();