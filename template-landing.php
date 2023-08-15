<?php
/**
 * Template name: Landing
 */

get_header(); 

if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>

        <div class="lading">
            <?php the_content(); ?>
        </div>
        
    <?php
    endwhile; 

endif; 

get_footer();