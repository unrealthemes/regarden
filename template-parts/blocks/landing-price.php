<?php

/**
 * landing-price Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'landing-price-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'lading lading_price di_block_p80';

if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title_lpr');
$tabs = get_field('tabs_lpr');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/landing-price.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="container">

            <?php if ( $title ) : ?>
                <div class="di_title"><?php echo $title; ?></div>
            <?php endif; ?>

            <?php if ($tabs) : ?>
                <div class="lading_price_content">
                    <div class="tabs">  
                        <ul> 
                            <?php foreach ($tabs as $tab) : ?>
                                <li><?php echo $tab['name_tabs_lpr']; ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="tabs_content">
                        
                            <?php 
                            foreach ($tabs as $tab) : 
                                $img_url = wp_get_attachment_url( $tab['img_tabs_lpr'], 'full' );
                            ?>
                                <div>
                                    <div class="lading_price_tabs_content">

                                        <?php echo $tab['txt_tabs_lpr']; ?>

                                        <?php if ($img_url) : ?>
                                            <img src="<?php echo $img_url; ?>" alt="<?php echo $tab['img_tabs_lpr']; ?>">
                                        <?php endif; ?>

                                        <?php if ($tab['select_form_tabs_lpr']) : ?>
                                            <a class="btn_di jsOpenModals" href="#calc_price">
                                                Узнать стоимость
                                            </a>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            <?php endforeach; ?>
                            
                        </div> 
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div> 

<?php endif; ?>