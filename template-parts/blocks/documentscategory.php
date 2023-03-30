<?php

/**
 * documents Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'documents-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'b_documentation section border20';
if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title_doc_c');
$categories = get_field('doc_c');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/documents.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-color: #F7F6F3;">
        <div class="container">

            <?php if ($title) : ?>
                <div class="section_title has_sidebar">
                    <h2><?php echo $title; ?></h2>
                </div>
            <?php endif; ?>

            <?php if ($categories) : ?>

                <div class="section_inner flex row jsTabs">
                    <div class="sidebar_block">
                        <div class="custom_list">
                            <div class="filter_list">

                                <?php 
                                foreach ($categories as $key => $category) : 
                                    $class = ( $key == 0 ) ? ' -active' : '';
                                ?>
                                    <div class="list_item jsTabsTab <?php echo $class; ?>">
                                        <?php echo $category['name_doc_c']; ?>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                    <div class="section_content">
                        <div class="section_content_inner">

                            <?php 
                            foreach ($categories as $key => $category) : 
                                $class = ( $key == 0 ) ? ' -active -fade' : ''; 
                                $imgs = $category['file_doc_c'];
                            ?>

                                <div class="documentation jsTabsItem <?php echo $class; ?>">
                                    <div class="documentation_slider jsDocumentationSlider">

                                        <?php 
                                        foreach ($imgs as $key => $img) : 

                                            if ( $img['mime_type'] == 'application/pdf' ) { // pdf file
                                                $preview = $img['icon'];
                                            } else {
                                                $preview = $img['sizes']['medium_large'];
                                            }
                                        ?>

                                            <div class="slider_block">
                                                <a class="image_wrapper" href="<?php echo esc_attr($img['url']); ?>" data-fancybox="documentation"> 
                                                    <div class="image_block">
                                                        <img src="<?php echo esc_attr($preview); ?>" alt="Document">
                                                    </div>
                                                </a>
                                                <!-- <div class="description">
                                                    <p>Свидетельство о разрешении на что-нибудь, еще случайный текст</p>
                                                </div> -->
                                            </div>

                                        <?php endforeach; ?>

                                    </div>
                                </div>

                            <?php endforeach; ?>
                            
                        </div>
                    </div>
                </div>

            <?php endif; ?>

        </div>
    </div>

<?php endif; ?>