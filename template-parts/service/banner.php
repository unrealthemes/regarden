<?php 
global $post;

$thumbnail = get_the_post_thumbnail($post->ID, 'full'); 
?>

<div class="b_service_banner section border20" style="background-color: #E6E4E1;">
    <div class="container">
        <div class="banner_content">
            <div class="content">
                <?php the_title('<h1>', '</h1>'); ?>
            </div>
        </div>

        <?php if ($thumbnail) : ?>
            <div class="hero_image">
                <div class="img_wrapper">
                    <?php echo $thumbnail; ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>