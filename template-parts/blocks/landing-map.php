<?php

/**
 * landing-map Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'landing-map-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'lading lading_map';

if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title_landmap');
$phone = get_field('phone_landmap');
$address = get_field('address_landmap');
$mail = get_field('mail_landmap');
$map = get_field('map_landmap');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/landing-map.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="container"> 
            <div class="lading_map_content"> 
                
                <div class="map_block">

                    <?php if ( $title ) : ?>
                        <h2><?php echo $title; ?></h2>
                    <?php endif; ?>

                    <div class="map_block_vn">

                        <?php if ( $phone ) : ?>
                            <a href="tel:<?php echo $phone; ?>" class="di_tel">
                                <?php echo $phone; ?>
                            </a>
                        <?php endif; ?>

                        <div class="di_aderes">

                            <?php if ( $address ) : ?>
                                <p><?php echo $address; ?></p>
                            <?php endif; ?>

                            <?php if ( $mail ) : ?>
                                <a href="mailto:<?php echo $mail; ?>">
                                    <?php echo $mail; ?>
                                </a>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

                <?php if ( $map ) : ?>
                    <?php echo $map; ?>
                <?php endif; ?>   
            
            </div>
        </div>
    </div>

<?php endif; ?>