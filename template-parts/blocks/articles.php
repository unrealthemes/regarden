<?php

/**
 * articles Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'articles-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'b_articles border20 section';
if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title_articles');
$args = [
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => -1,
];
$query = new WP_Query( $args );
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/articles.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-color: #F7F6F3;">
        <div class="container">

            <?php if ( $title ) : ?>
                <div class="section_title has_sidebar">
                    <h2><?php echo $title; ?></h2>
                </div>
            <?php endif; ?>

            <?php if ( $query->have_posts() ) : ?>
                <div class="section_inner flex row">
                    <div class="sidebar_block"></div>
                    <div class="section_content">
                        <div class="articles_wrapper">
                            <div class="articles_list">

                                <?php 
                                $i = 1;
                                while ($query->have_posts()) : 
                                    $query->the_post(); 
                                    $hidden = ($i > 5) ? 'hidden' : '';
                                ?>

                                    <?php get_template_part('template-parts/content', 'post', ['class' => $hidden]); ?>

                                <?php 
                                    $i++;
                                endwhile; 
                                ?>

                                <?php if ( $query->found_posts > 5 ) : ?>
                                    <div class="more_wrapper">
                                        <button class="btn btn_green_empty w100 show-articles-js" type="button">
                                            показать еще
                                        </button>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php 
            endif; 
            wp_reset_postdata();
            ?>

        </div>
    </div>

<?php endif; ?>