<?php

/**
 * services Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'services-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'b_services section border20';
if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title_service');
$categories = get_field('categories_service');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/services.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-color: #F7F6F3;">
        <div class="container">

            <?php if ( $title ) : ?>
                <div class="section_title has_sidebar">
                    <h2><?php echo $title; ?></h2>
                </div>
            <?php endif; ?>

            <?php if ( $categories ) : ?>
                <div class="section_inner flex row jsTabs">
                    <div class="sidebar_block">
                        <div class="services_tabs custom_list">
                            <div class="tabs_list">

                                <?php 
                                foreach ($categories as $key => $category) : 
                                    $class = ($key == 0) ? '-active' : '';
                                ?>
                                    <div class="list_item jsTabsTab <?php echo $class; ?>">
                                        <?php echo $category->name; ?>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                    <div class="section_content">
                        <div class="services_block">
                            <div class="tabs_content">

                                <?php 
                                foreach ($categories as $key => $category) : 
                                    $class = ($key == 0) ? '-active -fade' : '';
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
                                    <div class="services_wrapper jsTabsItem <?php echo $class; ?>"> 
                                        <div class="services_wrapper_inner">
                                            <div class="mobile_title">
                                                <div class="title">
                                                    <?php echo $category->name; ?>
                                                </div>
                                            </div>

                                            <?php if ( $query->have_posts() ) : ?>
                                                <div class="services_section">
                                                    <div class="services_list flex">

                                                        <?php 
                                                        $i = 1;
                                                        while ($query->have_posts()) : 
                                                            $query->the_post(); 
                                                            $hidden = ($i > 9) ? 'hidden' : '';
                                                            $thumbnail = get_the_post_thumbnail(get_the_ID(), 'full'); 
                                                        ?>

                                                            <div class="service_item <?php echo $hidden; ?>">
                                                                <a class="service_link" href="<?php the_permalink(); ?>">

                                                                    <?php if ( $thumbnail ) : ?>
                                                                        <div class="service_image">
                                                                            <div class="image">
                                                                                <?php echo $thumbnail; ?>
                                                                            </div>
                                                                        </div>
                                                                    <?php endif; ?>

                                                                    <?php the_title('<div class="service_title">', '</div>'); ?>
                                                                </a>
                                                            </div>

                                                        <?php 
                                                            $i++;
                                                        endwhile; 
                                                        ?>

                                                    </div>

                                                    <?php if ( $query->found_posts > 9 ) : ?>
                                                        <div class="more_wrapper">
                                                            <button class="btn btn_green_empty w100 show-services-js" type="button">
                                                                показать еще
                                                            </button>
                                                        </div>
                                                    <?php endif; ?>

                                                </div>
                                            <?php 
                                            endif; 
                                            wp_reset_postdata();
                                            ?>

                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>

<?php endif; ?>