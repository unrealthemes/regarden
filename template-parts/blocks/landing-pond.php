<?php

/**
 * landing-pond Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'landing-pond-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'lading lading_prud di_block_p80';

if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title_lpo');
$slides = get_field('slides_lpo');
$form = get_field('select_form_lpo');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/landing-pond.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="container">

            <?php if ( $title ) : ?>
                <div class="di_title"><?php echo $title; ?></div>
            <?php endif; ?>

            <?php if ($slides) : ?>
                <div class="lading_prud_content">
                    <div class="item_galery"> 
                        <div class="sync1 owl-carousel owl-theme"> 

                            <?php 
                            foreach ($slides as $slide_img_id) : 
                                $img_url = wp_get_attachment_url( $slide_img_id, 'full' );
                            ?>

                                <?php if ($img_url) : ?>
                                    <div class="item">
                                        <div class="item_content">
                                            <img src="<?php echo $img_url; ?>" alt="Image">
                                        </div>
                                    </div>
                                <?php endif; ?>

                            <?php endforeach; ?>
                            
                        </div>
                        
                        <div class="sync2 owl-carousel owl-theme"> 

                            <?php 
                            foreach ($slides as $slide_img_id) : 
                                $img_url = wp_get_attachment_url( $slide_img_id, 'full' );
                            ?>

                                <?php if ($img_url) : ?>
                                    <div class="item">
                                        <img src="<?php echo $img_url; ?>" alt="Image">
                                    </div>
                                <?php endif; ?>

                            <?php endforeach; ?>
                            
                        </div>
                    </div>

                    <?php if ($form) : ?>
                        <div class="block_center_brn">
                            <a class="btn_di jsOpenModals" href="#calc_price">РАССЧИТАТЬ СТОИМОСТЬ ВАШЕГО ПРУДА</a>
                        </div>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

        </div>
    </div>

<?php endif; ?>