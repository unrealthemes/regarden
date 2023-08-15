<?php

/**
 * installment Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'installment-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'lading lading_rosrocka di_block_p120';

if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title_ins');
$img_id = get_field('img_ins');
$img_url = wp_get_attachment_url( $img_id, 'full' );
$blocks = get_field('blocks_ins');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/installment.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="container">
            
            <?php if ( $title ) : ?>
                <div class="di_title"><?php echo $title; ?></div>
            <?php endif; ?>

            <div class="lading_rosrocka_content">

                <?php if ($img_url) : ?>
                    <div class="lading_rosrocka_l">
                        <img src="<?php echo $img_url; ?>" alt="Image">
                    </div>
                <?php endif; ?>

                <?php if ($blocks) : ?>

                    <div class="lading_rosrocka_r">

                        <?php foreach ($blocks as $block) : ?>
                            
                            <div class="lading_rosrocka_item">
                                <svg width="38" height="37" viewBox="0 0 38 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="38" height="37" rx="2" fill="#19A861"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.9394 23.0962L23.5962 17.4394L22.182 16.0251L17.9394 20.2677L15.8181 18.1464L14.4039 19.5606L16.5252 21.6819L16.5252 21.682L17.9394 23.0962Z" fill="white"/>
                                </svg>

                                <?php if ($block['title_blocks_ins']) : ?>
                                    <strong><?php echo nl2br($block['title_blocks_ins']); ?></strong>
                                <?php endif; ?>

                                <?php if ($block['desc_blocks_ins']) : ?>
                                    <p><?php echo nl2br($block['desc_blocks_ins']); ?></p>
                                <?php endif; ?>

                            </div>
                        
                        <?php endforeach; ?>
                        
                    </div>

                <?php endif; ?>

            </div>
        </div>
    </div>

<?php endif; ?>