<?php

/**
 * about Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'about-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'b_about_company section border20';
if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title_about');
$video_preview_id = get_field('video_preview_about');
$video = get_field('video_about');
$desc = get_field('desc_about');
$quote = get_field('quote_about');
$txt_link = get_field('txt_link_about');
$link = get_field('link_about');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/about.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-color: #F7F6F3;">
        <div class="container">

            <?php if ( $title ) : ?>
                <div class="section_title has_sidebar">
                    <h2><?php echo $title; ?></h2>
                </div>
            <?php endif; ?>

            <div class="section_inner flex row">

                <?php if ( $quote ) : ?>
                    <div class="sidebar_block">
                        <div class="info_block">
                            <div class="content">
                                <?php echo $quote; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="section_content">
                    <div class="about_company">

                        <?php 
                        if ( $video_preview_id ) : 
                            $video_preview_url = wp_get_attachment_url( $video_preview_id, 'full' );
                        ?>
                            <div class="video_wrapper">
                                <div class="video_poster">
                                    <img src="<?php echo esc_attr($video_preview_url); ?>" alt="YouTube">
									
									<?php if ( $video ) : ?>
										<a class="btn btn_green btn_video border20" href="<?php echo $video; ?>" data-fancybox>
											<span class="title">Смотреть видео</span>
										</a>
									<?php endif; ?>
									
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $desc ) : ?>
                            <div class="short_content">
                                <div class="content">
                                    <?php echo $desc; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $txt_link && $link ) : ?>
                            <div class="more_wrapper">
                                <a class="btn btn_green_empty w100" href="<?php echo esc_attr($link); ?>">
                                    <?php echo $txt_link; ?>
                                </a>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>