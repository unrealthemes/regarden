<?php

/**
 * contact-form Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'contact-form-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'b_request section border20';
if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title_cf');
$desc = get_field('desc_cf');
$form = get_field('form_cf');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/contact-form.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-color: #F7F6F3;">
        <div class="request_wrapper">
            <div class="container">
                <div class="section_inner flex row">

                    <?php if ( $title ) : ?>
                        <div class="sidebar_block">
                            <div class="section_title">
                                <h2><?php echo $title; ?></h2>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="section_content">
                        <div class="request">

                            <?php if ( $desc ) : ?>
                                <div class="content_wrap">
                                    <div class="content">
                                        <?php echo nl2br($desc); ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php 
                            if ( $form ) :
                                $contact_form = WPCF7_ContactForm::get_instance( $form->ID );
                            ?>
                                <div class="form_wrap">
                                    <?php echo do_shortcode( $contact_form->shortcode() ); ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>