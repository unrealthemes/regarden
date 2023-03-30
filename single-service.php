<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package unreal-themes
 */

get_header();

    while ( have_posts() ) :
        the_post();
        get_template_part('template-parts/service/banner');
        the_content();
    endwhile; 

get_footer();