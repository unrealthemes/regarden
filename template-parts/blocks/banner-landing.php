<?php

/**
 * banner-landing Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'banner-landing-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'lading lading_header';

if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title_bl');
$desc = get_field('desc_bl');
$desc_modal = get_field('desc_modal_bl');
$form = get_field('select_form_bl');
$bg_id = get_field('bg_id_bl');
$bg_url = wp_get_attachment_url( $bg_id, 'full' );
$bg_style = ($bg_url) ? 'style="background: url(' . $bg_style . ') no-repeat center top;"' : '';
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/banner-landing.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" <?php echo esc_attr($bg_style); ?>>
        <div class="container">

            <?php if ( $title ) : ?>
                <h1><?php echo nl2br($title); ?></h1>
            <?php endif; ?>

            <?php if ( $desc ) : ?>
                <h4><?php echo nl2br($desc); ?></h4>
            <?php endif; ?>

            <div class="lading_header_niz">

                <?php if ( $desc_modal ) : ?>
                    <div class="lading_header_white">
                        <?php echo $desc_modal; ?>
                    </div>
                <?php endif; ?>
                
                <?php if ( $form ) : ?>

                    <a class="btn_di jsOpenModals" href="#calc_price">
                        рассчитать стоимость
                    </a> 

                    <?php get_template_part('template-parts/modals/calc-price', null, ['form' => $form]); ?>

                <?php endif; ?>

            </div> 
        </div>
    </div> 

<?php endif; ?>