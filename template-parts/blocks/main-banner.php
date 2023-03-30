<?php

/**
 * main-banner Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'main-banner-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'b_main_banner section border20';
if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title_1 = get_field('title_1_mbanner');
$title_2 = get_field('title_2_mbanner');
$desc = get_field('desc_mbanner');
$soc_network = get_field('soc_network_mbanner');
$img_id = get_field('img_mbanner');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/main-banner.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-color: #E6E4E1;">
        <div class="container">
            <div class="banner_content">

                <?php if ( $soc_network ) : ?>
                    <div class="socials_wrapepr">
                        <?php echo $soc_network; ?>
                    </div>
                <?php endif; ?>

                <?php if ( $title_1 && $title_2 ) : ?>
                    <div class="title_wrapper">
                        <h1><?php echo $title_1; ?> <span><?php echo $title_2; ?></span></h1>
                    </div>
                <?php endif; ?>

                <?php if ( $desc ) : ?>
                    <div class="content">
                        <p><?php echo nl2br($desc); ?></p>
                    </div>
                <?php endif; ?>

            </div>

            <?php 
            if ( $img_id ) : 
                $img_url = wp_get_attachment_url( $img_id, 'full' );
            ?>
                <div class="hero_image">
                    <div class="img_wrapper">
                        <img src="<?php echo $img_url; ?>" alt="Main banner">
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>

<?php endif; ?>