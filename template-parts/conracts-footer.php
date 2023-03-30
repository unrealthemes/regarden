<?php 
$col_left = get_field('col_left_f', 'option');
$col_center = get_field('col_center_f', 'option');
$col_right = get_field('col_right_f', 'option');
?>

<div class="contacts_wrapper">

    <?php if ( $col_left ) : ?>
        <div class="conracts_row">
            <?php echo $col_left; ?>
        </div>
    <?php endif; ?>

    <?php if ( $col_center ) : ?>
        <div class="conracts_row">
            <?php echo $col_center; ?>
        </div>
    <?php endif; ?>

    <?php if ( $col_right ) : ?>
        <div class="conracts_row">
            <?php echo $col_right; ?>
        </div>
    <?php endif; ?>

</div>