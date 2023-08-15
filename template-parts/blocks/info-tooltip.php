<?php

/**
 * info-tooltip Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'info-tooltip-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'lading lading_vodomed di_block_p120';

if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title_ito');
$img_id = get_field('img_ito');
$img_url = wp_get_attachment_url( $img_id, 'full' );
$tooltips = get_field('tooltips_ito');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/info-tooltip.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="container">

            <?php if ( $title ) : ?>
                <div class="di_title"><?php echo $title; ?></div>
            <?php endif; ?>

            <div class="lading_vodomed_content"> 

                <?php if ($img_url) : ?>
                    <img src="<?php echo $img_url; ?>" alt="Image">
                <?php endif; ?>
                
                <?php if ($tooltips) : ?>

                    <?php foreach ($tooltips as $tooltip) : ?>

                        <div class="plus-minus" id="plusMinus1" onclick="toggleText(event)" style="top:<?php echo $tooltip['top_tooltips_ito']; ?>%; left:<?php echo $tooltip['left_tooltips_ito']; ?>%;">
                            <span class="symbol">+</span>
                            <div class="text"><?php echo nl2br($tooltip['txt_tooltips_ito']); ?></div>
                        </div>

                    <?php endforeach; ?>

                <?php endif; ?>
                

            </div>
        </div>
    </div> 

<?php endif; ?>