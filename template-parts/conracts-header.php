<?php 
$col_left = get_field('col_left', 'option');
$col_center = get_field('col_center', 'option');
$col_right = get_field('col_right', 'option');
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
        <div class="contacts_row">
			<div class="col-left">
				<a href="#request" class="btn btn_green send-request jsOpenModals">Оставить заявку</a>
			</div>
            <div class="col-right">
				<?php echo $col_right; ?>
			</div>
        </div>
    <?php endif; ?>

</div>