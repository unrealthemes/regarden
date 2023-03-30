<?php

/**
 * requisites Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'requisites-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'b_requisites section border20';
if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title_requisites');
$subtitle = get_field('subtitle_requisites');
$txt_l = get_field('txt_l_requisites');
$txt_r = get_field('txt_r_requisites');
$txt_btn = get_field('txt_btn_requisites');
$file = get_field('file_requisites');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/requisites.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="container">
            <div class="section_inner flex row">
                <div class="sidebar_block"></div>
                <div class="section_content">

                    <?php if ( $title ) : ?>
                        <div class="section_title">
                            <h2><?php echo $title; ?></h2>
                        </div>
                    <?php endif; ?>

                    <div class="content_wrapper">

                        <?php if ( $subtitle ) : ?>
                            <div class="content">
                                <h3><?php echo $subtitle; ?></h3>
                            </div>
                        <?php endif; ?>

                        <div class="requisites">

                            <?php if ( $txt_l ) : ?>
                                <div class="requisites_column">
                                    <?php echo $txt_l; ?>
                                </div>
                            <?php endif; ?>

                            <?php if ( $txt_r ) : ?>
                                <div class="requisites_column">
                                    <?php echo $txt_r; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>

                    <?php if ( $txt_btn && $file ) : ?>
                        <div class="btn_wrapper">
                            <a class="btn btn_green_empty w100" href="<?php echo esc_url($file['url']); ?>" download>
                                <?php echo $txt_btn; ?>
                            </a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

<?php endif; ?>