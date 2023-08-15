<?php

/**
 * video-review Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'video-review-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'lading lading_otzuv di_block_p80';

if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title_vrev');
$img_id = get_field('img_vrev');
$img_url = wp_get_attachment_url( $img_id, 'full' );
$txt = get_field('txt_vrev');
$youtube_link = get_field('youtube_link_vrev');
$blocks = get_field('blocks_vrev');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/video-review.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="container">
            <div class="lading_otzuv_col2">
                <div class="di_title">

                    <?php echo $title; ?>

                    <?php if ($img_url) : ?>
                        <img src="<?php echo $img_url; ?>" alt="Image">
                    <?php endif; ?>

                    <p><?php echo nl2br($txt); ?></p>

                    <?php if ($youtube_link) : ?>
                        <a href="<?php echo esc_url($txt); ?>" class="svg_icon" target="_blank">
                            <span>смотреть на</span>
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="16" cy="16" r="16" fill="#F40000"/>
                                <path d="M22.9705 15.1307C22.9705 14.8204 22.9188 14.4584 22.9188 14.0446C22.8671 13.6309 22.8153 13.2172 22.7636 12.8551C22.6602 12.4414 22.505 12.1311 22.1947 11.8725C21.9361 11.6139 21.5741 11.4588 21.2121 11.4071C20.0226 11.2519 18.2642 11.2002 15.8852 11.2002C13.5063 11.2002 11.6961 11.2519 10.5584 11.4071C10.1963 11.4588 9.83433 11.6139 9.57575 11.8725C9.31716 12.1311 9.11029 12.4414 9.00685 12.8551C8.90342 13.2172 8.85171 13.5792 8.85171 14.0446C8.79999 14.4584 8.79999 14.8204 8.79999 15.1307C8.79999 15.441 8.79999 15.803 8.79999 16.3202C8.79999 16.8374 8.79999 17.2511 8.79999 17.5097C8.79999 17.82 8.85171 18.182 8.85171 18.5958C8.90343 19.0095 8.95514 19.4232 9.00685 19.7852C9.11029 20.199 9.26544 20.5093 9.57575 20.7679C9.83433 21.0265 10.1963 21.1816 10.5584 21.2333C11.7479 21.3885 13.5063 21.4402 15.8852 21.4402C18.2642 21.4402 20.0743 21.3885 21.2121 21.2333C21.5741 21.1816 21.9361 21.0265 22.1947 20.7679C22.4533 20.5093 22.6602 20.199 22.7636 19.7852C22.8671 19.4232 22.9188 19.0612 22.9188 18.5958C22.9705 18.182 22.9705 17.82 22.9705 17.5097C22.9705 17.1994 22.9705 16.8374 22.9705 16.3202C22.9705 15.803 22.9705 15.3893 22.9705 15.1307ZM18.6263 16.7339L14.5406 19.2681C14.4889 19.3198 14.3854 19.3715 14.282 19.3715C14.1786 19.3715 14.1269 19.3715 14.0234 19.3198C13.8683 19.2164 13.7648 19.0612 13.7648 18.8543V13.7343C13.7648 13.5275 13.8683 13.3723 14.0234 13.2689C14.1786 13.1654 14.3854 13.1654 14.5406 13.2689L18.6263 15.803C18.7814 15.9065 18.8848 16.0616 18.8848 16.2168C18.8848 16.3719 18.7814 16.6305 18.6263 16.7339Z" fill="white"/>
                            </svg> 
                        </a> 
                    <?php endif; ?>

                </div>
                
                <?php if ($blocks) : ?>
                    <div class="lading_prud_content"> 
                        <div class="item_galery owl-carousel"> 
                            <div class="list_view  owl-theme"> 
                            
                                <?php 
                                foreach ($blocks as $block) : 
                                    $youtube_img_url = wp_get_attachment_url( $block['youtube_img_blocks_vrev'], 'full' );
                                    $youtube_id = str_replace('https://youtu.be/', '', $block['youtube_blocks_vrev']);
                                ?>

                                    <div class="item">
                                        <div class="item_content"> 
                                            <div class="reviews_video">

                                                <div class="video-container">
                                                    <div class="video-wrapper">

                                                        <iframe id="video-iframe" width="560" height="300" src="https://www.youtube.com/embed/<?php echo $youtube_id; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>

                                                        <?php if ($youtube_img_url) : ?>
                                                            <img class="video-placeholder" src="<?php echo $youtube_img_url; ?>" alt="Video">
                                                        <?php endif; ?>

                                                    </div>

                                                    <div class="overlay"></div>
                                                    <div class="play-button">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/images/play.png" alt="Play">
                                                    </div>

                                                </div> 
                                                
                                                <?php if ($block['name_blocks_vrev']) : ?>
                                                    <div class="di_name">
                                                        <?php echo $block['name_blocks_vrev']; ?>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if ($block['desc_blocks_vrev']) : ?>
                                                    <div class="di_desk">
                                                        <?php echo $block['desc_blocks_vrev']; ?>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if ($block['link_blocks_vrev']) : ?>
                                                    <div class="di_a">
                                                        <a href="<?php echo esc_url($block['link_blocks_vrev']); ?>" class="btn_di">подробнее</a>
                                                    </div>
                                                <?php endif; ?>

                                            </div> 
                                            
                                        </div>
                                    </div>

                                <?php endforeach; ?>

                            </div>
                            <div class="owl_nav"></div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>  

<?php endif; ?>