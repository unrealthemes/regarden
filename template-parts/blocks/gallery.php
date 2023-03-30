<?php

/**
 * gallery Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'gallery-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'b_gallery border20 section';
if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title_gallery');
$imgs = get_field('gallery');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/gallery.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="container">

            <?php if ($title) : ?>
                <div class="section_title has_sidebar">
                    <h2><?php echo $title; ?></h2>
                </div>
            <?php endif; ?>

            <?php if ($imgs) : ?>
                <div class="section_inner flex row">
                    <div class="sidebar_block"></div>
                        <div class="section_content">
                        <div class="gallery_wrapper">
                            <div class="gallery_list masonry">

                                <?php 
                                foreach ($imgs as $key => $img) : 
                                    $i = $key + 1;

                                    if ( $i % 2 == 0 ) :
                                        $class = 'masonry-item masonry-item-67';
                                    elseif ( $i % 3 == 0 ) :
                                        $class = 'masonry-item masonry-item-100';
                                    else :
                                        $class = 'masonry-item';
                                    endif;

                                    $class .= ( $i > 5 ) ? ' hidden' : '';
                                ?>

                                    <div class="<?php echo $class; ?>">
                                        <a href="<?php echo esc_attr($img['url']); ?>" data-fancybox="gallery_all">
                                            <img src="<?php echo esc_attr($img['sizes']['medium_large']); ?>" alt="Gallery">
                                        </a>
                                    </div>

                                <?php endforeach; ?>

                            </div>
                        </div>

                        <?php if ( count($imgs) > 5 ) : ?>
                            <div class="more_wrapper">
                                <button class="btn btn_green_empty w100 show-gallery-js" type="button">показать еще</button>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>

<?php endif; ?>