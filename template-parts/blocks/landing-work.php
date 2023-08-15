<?php

/**
 * landing-work Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'landing-work-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'lading lading_work di_block_p120';

if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title_lw');
$tabs = get_field('tabs_lw');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/landing-work.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="container">

            <?php if ( $title ) : ?>
                <div class="di_title"><?php echo $title; ?></div>
            <?php endif; ?>

            <?php if ($tabs) : ?>
                <div class="lading_work_content">
                
                    <div class="tabs_litle tabs_galery"> 
                        <div class="tabs"> 
                            <ul> 
                                <?php foreach ($tabs as $tab) : ?>
                                    <li><?php echo $tab['name_tabs_lw']; ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="tabs_content">

                                <?php foreach ($tabs as $tab) : ?>

                                    <?php if ($tab['slides_tabs_lw']) : ?>
                                        
                                        <div> 
                                            <div class="item_galery"> 
                                                <div class="sync1 owl-carousel owl-theme"> 

                                                    <?php 
                                                    foreach ($tab['slides_tabs_lw'] as $slide) : 
                                                        $img_url = wp_get_attachment_url( $slide['img_slides_tabs_lw'], 'full' );
                                                    ?>

                                                        <div class="item">
                                                            <div class="item_content">

                                                                <?php if ($img_url) : ?>
                                                                    <div class="item_content_l">
                                                                        <img src="<?php echo $img_url; ?>" alt="<?php echo $slide['title_slides_tabs_lw']; ?>">
                                                                    </div>
                                                                <?php endif; ?>

                                                                <div class="item_content_r">

                                                                    <?php if ($slide['title_slides_tabs_lw']) : ?>
                                                                        <div class="item_content_r_title">
                                                                            <?php echo $slide['title_slides_tabs_lw']; ?>
                                                                        </div>
                                                                    <?php endif; ?>

                                                                    <?php if ($slide['date_slides_tabs_lw']) : ?>
                                                                        <div class="item_content_r_data">
                                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M19 4H5C3.89543 4 3 4.89543 3 6V20C3 21.1046 3.89543 22 5 22H19C20.1046 22 21 21.1046 21 20V6C21 4.89543 20.1046 4 19 4Z" stroke="#19A861" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                <path d="M3 10H21" stroke="#19A861" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                <path d="M16 2V6" stroke="#19A861" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                <path d="M8 2V6" stroke="#19A861" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                                                            </svg> 
                                                                            <span><?php echo $slide['date_slides_tabs_lw']; ?></span>
                                                                        </div>
                                                                    <?php endif; ?>

                                                                    <?php if ($slide['txt_slides_tabs_lw']) : ?>
                                                                        <div class="item_content_r_text">
                                                                            <?php echo $slide['txt_slides_tabs_lw']; ?>
                                                                        </div>
                                                                    <?php endif; ?>

                                                                    <?php if ( $slide['txt_btn_download_slides_tabs_lw'] && $slide['select_form_download_slides_tabs_lw'] ) : ?>
                                                                        <div class="item_content_r_btn_di">
                                                                            <a href="#download_form" class="btn_di jsOpenModals">
                                                                                <?php echo $slide['txt_btn_download_slides_tabs_lw']; ?>
                                                                            </a>
                                                                        </div> 
                                                                    <?php endif; ?>

                                                                    <?php if ($slide['select_form_slides_tabs_lw']) : ?>

                                                                        <div class="item_content_r_a">
                                                                            <a class="jsOpenModals" href="#calc_price">
                                                                                Узнать стоимость строительства такого же пруда
                                                                            </a>
                                                                        </div>

                                                                        <?php // get_template_part('template-parts/modals/calc-price', null, ['form' => $slide['select_form_slides_tabs_lw']]); ?>

                                                                    <?php endif; ?>

                                                                </div> 
                                                            </div>
                                                        </div>

                                                    <?php endforeach; ?>
                                            
                                                </div>

                                                <div class="sync2 owl-carousel owl-theme"> 

                                                    <?php 
                                                    foreach ($tab['slides_tabs_lw'] as $slide) : 
                                                        $img_url = wp_get_attachment_url( $slide['img_slides_tabs_lw'], 'full' );
                                                    ?>

                                                        <?php if ($img_url) : ?>
                                                            <div class="item">
                                                                <img src="<?php echo $img_url; ?>" alt="<?php echo $slide['title_slides_tabs_lw']; ?>">
                                                            </div>
                                                        <?php endif; ?>
                                                 
                                                    <?php endforeach; ?>

                                                </div>

                                            </div>
                                        </div>

                                    <?php endif; ?>

                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div> 
                </div>
            <?php endif; ?>

        </div>
    </div> 

    <?php foreach ($tabs as $tab) : ?>

        <?php foreach ($tab['slides_tabs_lw'] as $slide) : ?>

            <?php if ( $slide['txt_btn_download_slides_tabs_lw'] && $slide['select_form_download_slides_tabs_lw'] ) : ?>
                <?php get_template_part('template-parts/modals/download', null, ['form' => $slide['select_form_download_slides_tabs_lw']]); ?>
            <?php endif; ?>

        <?php endforeach; ?>

    <?php endforeach; ?>

<?php endif; ?>