<?php

/**
 * video Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'video-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'video_wrapper';
if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$preview_id = get_field('preview_video');
$video = get_field('video');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/video.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <?php 
    if ( $video && $preview_id ) : 
        $preview_url = wp_get_attachment_url( $preview_id, 'full' );
    ?>

        <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
            <div class="video_poster">
                <img src="<?php echo esc_attr($preview_url); ?>" alt="YouTube">
                <a class="btn btn_green btn_video border20" href="<?php echo $video; ?>" data-fancybox>
                    <span class="title">Смотреть видео</span>
                </a>
            </div>
        </div>

    <?php endif; ?>

<?php endif; ?>