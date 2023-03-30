<?php 
$thumbnail = get_the_post_thumbnail(get_the_ID(), 'full'); 
$thumbnail = ($thumbnail) ? $thumbnail : '<img src="' . THEME_URI . '/images/default-image.png" alt="' . get_the_title() . '">';
?>

<div class="article_row <?php echo $args['class']; ?>">
    <div class="article_card">
        <div class="article_card_inner flex">

            <?php if ( $thumbnail ) : ?>
                <div class="article_image">
                    <a href="<?php the_permalink(); ?>" class="image">
                        <?php echo $thumbnail; ?>
                    </a>
                </div>
            <?php endif; ?>

            <div class="card_description">
                <a href="<?php the_permalink(); ?>" class="article_title">
                    <?php the_title('<h3>', '</h3>'); ?>
                </a>
                <div class="article_date">
                    <?php echo get_the_date('d F Y'); ?>
                </div>
                <div class="article_excerpt">
                    <?php the_excerpt(); ?>
                </div>
            </div>
        </div>
    </div>
</div>