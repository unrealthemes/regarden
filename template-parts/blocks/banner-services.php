<?php

/**
 * banner-services Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'banner-services-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'b_service_banner section border20';

if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

global $post;

$thumbnail = get_the_post_thumbnail($post->ID, 'full'); 
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/banner-services.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" <?php echo esc_attr($bg_style); ?>>
    <div class="" style="background-color: #E6E4E1;">
        <div class="container">
            <div class="banner_content">
                <div class="content">
                    <?php the_title('<h1>', '</h1>'); ?>
                </div>
            </div>

            <?php if ($thumbnail) : ?>
                <div class="hero_image">
                    <div class="img_wrapper">
                        <?php echo $thumbnail; ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>

<?php endif; ?>