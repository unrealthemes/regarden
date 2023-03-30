<?php 
global $post;

$related = get_posts( 
    [
        'category__in' => wp_get_post_categories($post->ID), 
        'numberposts'  => 8, 
        'post__not_in' => [ $post->ID ]
    ]
);

if ( $related ) :
?>

    <div class="b_articles border20 section last_section" style="background-color: #F6F6F3;">
        <div class="container">
            <div class="section_title has_sidebar">
                <h2>другие статьи</h2>
            </div>
            <div class="section_inner flex row">
                <div class="sidebar_block"></div>
                    <div class="section_content">
                        <div class="articles_wrapper">
                            <div class="articles_list">

                                <?php 
                                $i = 1;
                                foreach ( $related as $post ) : 
                                    setup_postdata( $post );
                                    $hidden = ($i > 5) ? 'hidden' : '';
                                ?>

                                    <?php get_template_part('template-parts/content', 'post', ['class' => $hidden]); ?>

                                <?php 
                                    $i++;
                                endforeach; 
                                wp_reset_postdata();
                                ?>

                            </div>

                            <?php if ( count($related) > 5 ) : ?>
                                <div class="more_wrapper">
                                    <button class="btn btn_green_empty w100 show-related-js" type="button">
                                        показать еще
                                    </button>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>