<?php 
$categories = get_terms( 
    'cat_service', 
    [
        'orderby' => 'name',
        'order' => 'ASC',
        'hide_empty' => false,
    ] 
); 
?>

<?php if ( $categories ) : ?>

    <div class="mega_menu_wrapper">
        <div class="container">
            <div class="mega_menu">
                <div class="menu_left">
                    <ul>

                        <?php 
                        foreach ( $categories as $key => $category ) : 
                            $args = [
                                'post_type' => 'service',
                                'post_status' => 'publish',
                                'posts_per_page' => -1,
                                'tax_query' => [
                                    [
                                        'taxonomy' => $category->taxonomy,
                                        'field' => 'slug',
                                        'terms' => $category->slug,
                                    ]
                                ]
                            ];
                            $query = new WP_Query( $args );
                        ?>

                            <li>
                                <a class="jsNextMenu" href="javascript:;">
                                    <?php echo esc_html($category->name); ?>
                                </a>

                                <?php if ( $query->have_posts() ) : ?>

                                    <ul class="sub-menu">

                                        <?php while ($query->have_posts()) : $query->the_post(); ?>

                                            <li>
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </li>

                                        <?php endwhile; ?>

                                    </ul>

                                <?php 
                                endif; 
                                wp_reset_postdata();
                                ?>

                            </li>

                        <?php endforeach; ?>
                    
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>