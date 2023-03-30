<?php

/**
 * contacts Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'contacts-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'b_contacts section border20';
if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title_contacts');
$title_address = get_field('title_address_contacts');
$txt_address = get_field('txt_address_contacts');
$title_mail = get_field('title_mail_contacts');
$txt_mail = get_field('txt_mail_contacts');
$title_time = get_field('title_time_contacts');
$txt_time = get_field('txt_time_contacts');
$title_phones_l = get_field('title_phones_l_contacts');
$phones_l = get_field('phones_l_contacts');
$title_phones_r = get_field('title_phones_r_contacts');
$phones_r = get_field('phones_r_contacts');
$social_network = get_field('social_network_contacts');
$form = get_field('form_contacts');
$map = get_field('y_m_contacts');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/contacts.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-color: #F7F6F3;">
        <div class="container">
            <div class="section_inner flex row">
                <div class="sidebar_block"></div>
                <div class="section_content">

                    <?php if ( $title ) : ?>
                        <div class="section_title">
                            <h1><?php echo $title; ?></h1>
                        </div>
                    <?php endif; ?>

                    <div class="contacts_wrapper flex">
                        <div class="contacts_wrapper_inner">
                            <div class="contacts_row w100">

                                <?php if ( $title_address ) : ?>
                                    <div class="label_title"><?php echo $title_address; ?></div>
                                <?php endif; ?>

                                <?php if ( $txt_address ) : ?>
                                    <div class="content">
                                        <h3><?php echo $txt_address; ?></h3>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <div class="contacts_row">

                                <?php if ( $title_mail ) : ?>
                                    <div class="label_title"><?php echo $title_mail; ?></div>
                                <?php endif; ?>

                                <?php if ( $txt_mail ) : ?>
                                    <div class="content">
                                        <p> 
                                            <a href="mailto:<?php echo $txt_mail; ?>"><?php echo $txt_mail; ?></a>
                                        </p>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <div class="contacts_row">

                                <?php if ( $title_time ) : ?>
                                    <div class="label_title"><?php echo $title_time; ?></div>
                                <?php endif; ?>

                                <?php if ( $txt_time ) : ?>
                                    <div class="content">
                                        <p><?php echo $txt_time; ?></p>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <div class="contacts_row">

                                <?php if ( $title_phones_l ) : ?>
                                    <div class="label_title"><?php echo $title_phones_l; ?></div>
                                <?php endif; ?>

                                <?php if ( $phones_l ) : ?>
                                    <div class="content">
                                        <?php echo $phones_l; ?>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <div class="contacts_row">

                                <?php if ( $title_phones_r ) : ?>
                                    <div class="label_title"><?php echo $title_phones_r; ?></div>
                                <?php endif; ?>

                                <?php if ( $phones_r ) : ?>
                                    <div class="content">
                                        <?php echo $phones_r; ?>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>

                        <?php if ( $social_network ) : ?>
                            <div class="socials_wrapepr">
                                <?php echo $social_network; ?>
                            </div>
                        <?php endif; ?>

                    </div>

                    <?php if ( $form ) : ?>
                        <div class="btn_wrapper">
                            <a class="btn btn_green_empty w100 jsOpenModals" href="#contact">
                                Написать нам
                            </a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

            <?php if ( $map ) : ?>
                <div class="map_wrapper">
                    <div class="map" id="map">
                        <?php echo $map; ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>

    <?php 
    // include modal
    if ( $form ) : 
        get_template_part('template-parts/modals/contact', null, ['form' => $form]);
    endif; 
    ?>

<?php endif; ?>