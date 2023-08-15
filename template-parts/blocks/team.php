<?php

/**
 * team Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'team-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'b_our_team section border20';
if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title_team');
$desc = get_field('desc_team');
$team = get_field('team');
$txt_sb = get_field('txt_sb_team');
$form_sb = get_field('form_sb_team');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/team.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="container">

            <?php if ( $title ) : ?>
                <div class="section_title has_sidebar style-h1">
                    <h1><?php echo $title; ?></h1>
                </div>
            <?php endif; ?>

            <div class="section_inner flex row">
                <div class="sidebar_block">
                    <div class="vacancies_info">

                        <?php if ( $txt_sb ) : ?>
                            <div class="info_content">
                                <?php echo $txt_sb; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ( $form_sb ) : ?>
                            <div class="btn_row w100">
                                <a class="btn btn_green border20 w100 jsOpenModals" href="#vacancies">
                                    вакансии
                                </a>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="section_content">

                    <?php if ($desc) : ?>
                        <div class="team_description">
                            <div class="content">
                                <?php echo $desc; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ( $team ) : ?>
                        <div class="team_wrapper">
                            <div class="team_list">
                                <div class="team_slider jsTeamSlider">

                                    <?php foreach ($team as $item) : ?>
                                        <div class="team_block">

                                            <?php 
                                            if ($item['avatar_team']) : 
                                                $avatar_url = wp_get_attachment_url( $item['avatar_team'], 'full' );
                                            ?>
                                                <div class="team_image">
                                                    <div class="image_block">
                                                        <img src="<?php echo esc_attr($avatar_url); ?>" alt="<?php echo esc_attr($item['name_team']); ?>">
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($item['name_team']) : ?>
                                                <div class="team_name">
                                                    <?php echo nl2br($item['name_team']); ?>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($item['desc_team']) : ?>
                                                <div class="team_info">
                                                    <p><?php echo nl2br($item['desc_team']); ?></p>
                                                </div>
                                            <?php endif; ?>

                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

    <?php 
    // include modal
    if ( $form_sb ) : 
        get_template_part('template-parts/modals/vacancies', null, ['form' => $form_sb]);
    endif; 
    ?>

<?php endif; ?>