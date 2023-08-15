<?php

/**
 * order Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'order-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'lading lading_zakaz';

if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title_order');
$subtitle = get_field('subtitle_order');
$blocks = get_field('blocks_order');

$img_form = get_field('img_form_order');
$img_form_url = wp_get_attachment_url( $img_form, 'full' );
$title_form = get_field('title_form_order');
$desc_form = get_field('desc_form_order');
$form = get_field('select_form_order');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/order.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="container">

            <?php if ( $title ) : ?>
                <div class="di_title"><?php echo $title; ?></div>
            <?php endif; ?>

            <div class="lading_zakaz_content">

                <?php if ( $subtitle ) : ?>
                    <h4><?php echo $subtitle; ?></h4>
                <?php endif; ?>
                
                <?php if ($blocks) : ?>

                    <div class="lading_zakaz_row">

                        <?php 
                        foreach ($blocks as $block) : 
                            $icon_url = wp_get_attachment_url( $block['icon_blocks_order'], 'full' );
                        ?>

                            <div class="lading_zakaz_item">

                                <?php if ( $icon_url ) : ?>
                                    <img src="<?php echo $icon_url; ?>" alt="<?php echo $block['txt_blocks_order']; ?>">
                                <?php endif; ?>

                                <?php if ( $block['txt_blocks_order'] ) : ?>
                                    <span><?php echo $block['txt_blocks_order']; ?></span>
                                <?php endif; ?>

                            </div>

                        <?php endforeach; ?>
                        
                    </div>

                <?php endif; ?>
                
                <div class="lading_zakaz_form">
                    <div class="lading_zakaz_l">

                        <?php if ( $img_form_url ) : ?>
                            <img src="<?php echo $img_form_url; ?>" alt="Image form">
                        <?php endif; ?>

                    </div>
                    <div class="lading_zakaz_r">

                        <?php if ( $title_form ) : ?>
                            <h4><?php echo $title_form; ?></h4>
                        <?php endif; ?>

                        <?php if ( $desc_form ) : ?>
                            <p><?php echo nl2br($desc_form); ?></p>
                        <?php endif; ?>

                        <?php 
                        if ( $form ) : 
                            $contact_form = WPCF7_ContactForm::get_instance( $form->ID ); 
                        ?>
                            <div class="di_form">
                                <?php echo do_shortcode( $contact_form->shortcode() ); ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div> 

<?php endif; ?>