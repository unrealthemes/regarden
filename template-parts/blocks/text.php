<?php

/**
 * seo Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'seo-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'b_service_description section border20';
if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title_seo');
$desc = get_field('desc_seo');
$txt_link = get_field('txt_link_seo');
$link = get_field('link_seo');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/text.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-color: #F7F6F3;">
        <div class="container">
            <div class="section_inner flex row">

                <?php if ( $title ) : ?>
                    <div class="sidebar_block">
                        <div class="sidebar_content">
                            <h3><?php echo $title; ?></h3>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="section_content">

                    <?php if ( $desc ) : ?>
                        <div class="content_wrapper">
                            <div class="content">
                                <?php echo $desc; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ( $txt_link && $link ) : ?>
                        <div class="more_wrapper">
                            <a class="btn btn_green_empty w100" href="<?php echo $link; ?>">
                                <?php echo $txt_link; ?>
                            </a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

<?php endif; ?>