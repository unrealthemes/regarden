<?php

/**
 * guarantees Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'guarantees-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'lading lading_garantii di_block_p120';

if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title_gua');
$blocks = get_field('blocks_gua');
$title_form = get_field('title_form_gua');
$desc_form = get_field('desc_form_gua');
$form = get_field('select_form_gua');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/guarantees.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="container">

            <?php if ( $title ) : ?>
                <div class="di_title"><?php echo $title; ?></div>
            <?php endif; ?>

            <div class="lading_garantii_content"> 
                
                <?php if ($blocks) : ?>
                    
                    <div class="lading_garantii_row">

                        <?php 
                        foreach ($blocks as $key => $block) : 
                            $count = ($key > 9) ? $key + 1 : '0' . $key + 1;
                        ?>

                            <div class="lading_garantii_row_item"> 
                                <span><?php echo $count; ?></span>

                                <?php if ( $block['title_blocks_gua'] ) : ?>
                                    <div class="lading_garantii_name">
                                        <?php echo $block['title_blocks_gua']; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ( $block['desc_blocks_gua'] ) : ?>
                                    <p><?php echo nl2br($block['desc_blocks_gua']); ?></p>
                                <?php endif; ?>

                            </div>
                        
                        <?php endforeach; ?>

                    </div>

                <?php endif; ?>
                
                <div class="lading_f_row">
                    <div class="lading_f_row_l">

                        <?php if ( $title_form ) : ?>
                            <div class="lading_f_row_l_title">
                                <?php echo $title_form; ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ( $desc_form ) : ?>
                            <div class="lading_f_niz">
                                <?php echo $desc_form; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                    
                    <?php 
                    if ( $form ) : 
                        $contact_form = WPCF7_ContactForm::get_instance( $form->ID ); 
                    ?>
                        <div class="lading_f_row_r">
                            <div class="lading_zakaz_r">
                                <?php echo do_shortcode( $contact_form->shortcode() ); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- <div class="lading_f_row_r">
                        <div class="lading_zakaz_r">
                            <h4>Отправьте нам заявку</h4>
                            <p>И мы вам перезвоним в течении секунды-другой</p>
                            <div class="di_form">
                                <input type="text" value="" placeholder="Ваше имя" />
                                <input type="text" value="" placeholder="Ваше телефон" />
                                <input type="text" value="" placeholder="Ваши пожелания" />
                                <input type="submit" value="получить консультацию" /> 
                                <div class="validate_required">
                                    <label class="label_for_checkbox">
                                    <input type="checkbox" class="input_checkbox" name="terms" id="terms">
                                        Нажимая кнопку вы соглашаетесь с условиями <a href="#" target="_blank">политики конфиденциальности</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>