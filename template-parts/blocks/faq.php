<?php

/**
 * faq Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'faq-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'b_faq border20 section last_section';
if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title_faq');
$blocks = get_field('faq');
$txt_sb = get_field('txt_fb_faq');
$form_sb = get_field('form_fb_faq');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/faq.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="container">

            <?php if ($title) : ?>
                <div class="section_title has_sidebar">
                    <h2><?php echo $title; ?></h2>
                </div>
            <?php endif; ?>

            <div class="section_inner flex row">
                <div class="sidebar_block pos_sticky">
                    <div class="faq_info">

                        <?php if ($txt_sb) : ?>
                            <div class="info_content">
                                <?php echo $txt_sb; ?>
                            </div>
                        <?php endif; ?>

                        <div class="btn_row w100">
                            <a class="btn btn_green border20 w100 jsOpenModals" href="#faq">
                                задать вопрос
                            </a>
                        </div>
                    </div>
                </div>

                <?php if ($blocks) : ?>
                    <div class="section_content">
                        <div class="faq_wrapper">
                            <div class="faq_list flex jsAccord">

                                <?php foreach ($blocks as $block) : ?>
                                    <div class="faq_row jsAccordItem">
                                        <div class="faq_title jsAccordBtn">
                                            <div class="title"><?php echo $block['question_faq']; ?></div>
                                        </div>
                                        <div class="faq_content jsAccordContent">
                                            <div class="content">
                                                <?php echo nl2br($block['answer_faq']); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <?php 
    // include modal
    if ( $form_sb ) : 
        get_template_part('template-parts/modals/faq', null, ['form' => $form_sb]);
    endif; 
    ?>

<?php endif; ?>