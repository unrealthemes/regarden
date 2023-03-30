<?php

/**
 * table Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'table-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'b_cost border20 section';
if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title_tbl');
$tables = get_field('tbl');
$info = get_field('info_txt_tbl');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/table.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-color: #F7F6F3;">
        <div class="container">

        <?php if ($title) : ?>
            <div class="section_title has_sidebar">
                <h2><?php echo $title; ?></h2>
            </div>
        <?php endif; ?>

        <div class="section_inner flex row">

            <?php if ($info) : ?>
                <div class="sidebar_block">
                    <div class="info_block_wrapper pos_sticky">
                        <div class="info_block">
                            <div class="content">
                                <?php echo $info; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($tables) : ?>
                <div class="section_content">
                    <div class="cost_wrapper table_theme">
                        <div class="tables_list">

                            <?php 
                            foreach ($tables as $table) : 
                                $title_tbl = $table['title_tbl'];
                                $cols = $table['tb_tbl'];
                            ?>
                                <div class="table_row">
                                    <div class="decor_left"></div>
                                    <div class="decor_right"></div>
                                    <table>
                                        <thead>

                                            <?php if ($title_tbl) : ?>
                                                <tr>
                                                    <th colspan="4"><?php echo $title_tbl; ?></th>
                                                </tr>
                                            <?php endif; ?>

                                            <tr>
                                                <th><?php echo $table['name_1_th_tbl']; ?></th>
                                                <th><?php echo $table['name_2_th_tbl']; ?></th>
                                                <th><?php echo $table['name_3_th_tbl']; ?></th>
                                                <th><?php echo $table['name_4_th_tbl']; ?></th>
                                            </tr>
                                        </thead>

                                        <?php if ($cols) : ?>

                                            <tbody>

                                                <?php foreach ($cols as $col) : ?>   

                                                    <?php if ( empty($col['val_2_tb_tbl']) && empty($col['val_3_tb_tbl']) && empty($col['val_4_tb_tbl']) ) : ?>
                                                        <tr>
                                                            <td colspan="4"><?php echo nl2br( $col['val_1_tb_tbl']); ?></td>
                                                        </tr>
                                                    <?php else : ?>
                                                        <tr>
                                                            <td><?php echo nl2br( $col['val_1_tb_tbl']); ?></td>
                                                            <td><?php echo nl2br( $col['val_2_tb_tbl']); ?></td>
                                                            <td><?php echo nl2br( $col['val_3_tb_tbl']); ?></td>
                                                            <td><?php echo nl2br( $col['val_4_tb_tbl']); ?></td>
                                                        </tr>
                                                    <?php endif; ?>

                                                <?php endforeach; ?>

                                            </tbody>
                                        <?php endif; ?>

                                    </table>
                                </div>

                            <?php endforeach; ?>

                            <?php if ( count($tables) > 4 ) : ?>
                                <div class="more_wrapper">
                                    <a class="btn btn_green_empty w100 jsMoreTables" href="#">
                                        показать еще
                                    </a>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>

<?php endif; ?>