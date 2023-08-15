<?php

/**
 * landing-work2 Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'landing-work2-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'lading lading_work lading_work2 di_block_p120';

if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title_lw2');
$tabs = get_field('tabs_lw2');
?>
 
<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/landing-work2.png'" alt="Preview" style="width:100%;">
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
                                    <li>
                                        <?php echo $tab['name_tabs_lw2']; ?>
                                        <span><?php echo $tab['date_tabs_lw2']; ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="tabs_content">

                                <?php foreach ($tabs as $tab) : ?>

                                    <?php if ($tab['slides_tabs_lw2']) : ?>
                                        
                                        <div> 
                                            <div class="item_galery"> 
                                                <div class=""> 

                                                    <?php 
                                                    foreach ($tab['slides_tabs_lw2'] as $slide) : 
                                                        $img_url = wp_get_attachment_url( $slide['img_slides_tabs_lw2'], 'full' );
                                                    ?>

                                                        <div class="item">
                                                            <div class="item_content">

                                                                <?php if ($img_url) : ?>
                                                                    <div class="item_content_l">
                                                                        <img src="<?php echo $img_url; ?>" alt="<?php echo $slide['title_slides_tabs_lw2']; ?>">
                                                                    </div>
                                                                <?php endif; ?>

                                                                <div class="item_content_r">

                                                                    <?php if ($slide['title_slides_tabs_lw2']) : ?>
                                                                        <div class="item_content_r_title">
                                                                            <?php echo $slide['title_slides_tabs_lw2']; ?>
                                                                        </div>
                                                                    <?php endif; ?>

                                                                    <?php if ($slide['txt_slides_tabs_lw2']) : ?>
                                                                        <?php echo nl2br($slide['txt_slides_tabs_lw2']); ?>
                                                                    <?php endif; ?>

                                                                </div> 
                                                            </div>
                                                        </div>

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

<?php endif; ?>