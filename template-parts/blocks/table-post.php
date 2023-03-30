<?php

/**
 * table Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'table-post-' . $block['id'];

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'table_theme';
if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$tables = get_field('tbl_p');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>'/images/gutenberg-preview/table-post.png'" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="tables_list">

            <?php 
            foreach ($tables as $key => $table) : 
                $title_tbl = $table['title_tbl_p'];
                $cols = $table['tb_tbl_p'];
                $hidden = ($key > 3) ? 'hidden' : '';
            ?>
                <div class="table_row <?php echo $hidden; ?>">
                    <div class="decor_left"></div>
                    <div class="decor_right"></div>
                    <table>
                        <thead>

                            <?php if ($title_tbl) : ?>
                                <tr>
                                    <th colspan="4"><?php echo $title_tbl; ?></th>
                                </tr>
                            <?php endif; ?>

                            <?php if ( empty($col['name_1_th_tbl_p']) && empty($col['name_2_th_tbl_p']) && empty($col['name_3_th_tbl_p']) && empty($col['name_4_th_tbl_p']) ) : ?>

                            <?php elseif ( ! empty($col['name_1_th_tbl_p']) || ! empty($col['name_2_th_tbl_p']) || ! empty($col['name_3_th_tbl_p']) || ! empty($col['name_4_th_tbl_p']) ) : ?>
                                <tr>
                                    <th><?php echo $table['name_1_th_tbl_p']; ?></th>
                                    <th><?php echo $table['name_2_th_tbl_p']; ?></th>
                                    <th><?php echo $table['name_3_th_tbl_p']; ?></th>
                                    <th><?php echo $table['name_4_th_tbl_p']; ?></th>
                                </tr>
                            <?php endif; ?>

                        </thead>

                        <?php if ($cols) : ?>

                            <tbody>

                                <?php 
                                foreach ($cols as $col) : 
                                    if ( empty($col['val_1_tb_tbl_p']) && empty($col['val_2_tb_tbl_p']) && empty($col['val_3_tb_tbl_p']) && empty($col['val_4_tb_tbl_p']) ) :
                                        continue;
                                    endif;
                                ?>   

                                    <?php if ( empty($col['val_2_tb_tbl_p']) && empty($col['val_3_tb_tbl_p']) && empty($col['val_4_tb_tbl_p']) ) : ?>
                                        <tr>
                                            <td colspan="4"><?php echo nl2br( $col['val_1_tb_tbl_p']); ?></td>
                                        </tr>
                                    <?php else : ?>
                                        <tr>
                                            <td><?php echo nl2br( $col['val_1_tb_tbl_p']); ?></td>
                                            <td><?php echo nl2br( $col['val_2_tb_tbl_p']); ?></td>
                                            <td><?php echo nl2br( $col['val_3_tb_tbl_p']); ?></td>
                                            <td><?php echo nl2br( $col['val_4_tb_tbl_p']); ?></td>
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
                    <button class="btn btn_green_empty w100 jsMoreTablesPost" type="button">
                        показать еще
                    </button>
                </div>
            <?php endif; ?>

        </div>
    </div>

<?php endif; ?>