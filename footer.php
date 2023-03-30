<?php 
$logo_id = get_field('logo_footer', 'option');
?>	

	</main>
    <footer class="b_footer">
      <div class="top_part">
        <div class="container">
          <div class="part_wrapper flex row">
            <div class="left_part">
              <div class="logo_wrapper">
				<a class="link_logo" href="<?php echo esc_url( home_url('/') ); ?>" rel="home">
					<?php 
					if ( $logo_id ) : 
						$logo_url = wp_get_attachment_url( $logo_id, 'full' );
						if ( get_post_mime_type($logo_id) == 'image/svg+xml' ) :
							echo file_get_contents( $logo_url );
						else :
							echo '<img src="' . $logo_url . '" alt="Logo">';
						endif;
					endif; 
					?>
				</a>
			  </div>

			  <?php get_template_part('template-parts/conracts', 'footer'); ?>

            </div>
            <div class="right_part">
              <div class="footer_menu_wrapper">
                <div class="footer_menu flex row">
                  <div class="menu_column">
                    <div class="menu_title">
						<?php echo ut_get_title_menu_by_location('menu_2'); ?>
					</div>
                    <div class="menu">
						<?php
							if ( has_nav_menu('menu_2') ) :
								wp_nav_menu( [
									'theme_location' => 'menu_2',
									'container'      => false,
									// 'walker'         => new UT_Mega_Menu(),
									'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								] );
							endif;
						?>
                    </div>
                  </div>
                  <div class="menu_column">
					<div class="menu_title">
						<?php echo ut_get_title_menu_by_location('menu_3'); ?>
					</div>
					<div class="menu">
						<?php
							if ( has_nav_menu('menu_3') ) :
								wp_nav_menu( [
									'theme_location' => 'menu_3',
									'container'      => false,
									// 'walker'         => new UT_Mega_Menu(),
									'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								] );
							endif;
						?>
					</div>
                  </div>
                  <div class="menu_column">
				  	<div class="menu_title">
						<?php echo ut_get_title_menu_by_location('menu_4'); ?>
					</div>
					<div class="menu">
						<?php
							if ( has_nav_menu('menu_4') ) :
								wp_nav_menu( [
									'theme_location' => 'menu_4',
									'container'      => false,
									// 'walker'         => new UT_Mega_Menu(),
									'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								] );
							endif;
						?>
					</div>
                  </div>
                  <div class="menu_column">
				  	<div class="menu_title">
						<?php echo ut_get_title_menu_by_location('menu_5'); ?>
					</div>
					<div class="menu">
						<?php
							if ( has_nav_menu('menu_5') ) :
								wp_nav_menu( [
									'theme_location' => 'menu_5',
									'container'      => false,
									// 'walker'         => new UT_Mega_Menu(),
									'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								] );
							endif;
						?>
					</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="bottom_part">
        <div class="container">
          <div class="part_wrapper flex row">
            <div class="left_part">
              <div class="copy">2023 © REGARDEN — Официальный сайт</div>
            </div>
            <div class="right_part">
              <div class="bottom_menu row">
                
			  	<?php
					if ( has_nav_menu('menu_6') ) :
						wp_nav_menu( [
							'theme_location' => 'menu_6',
							'container'      => false,
							// 'walker'         => new UT_Mega_Menu(),
							'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						] );
					endif;
				?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

	<?php get_template_part('template-parts/modals/thanks'); ?>
		
	<?php wp_footer(); ?>

  </body>
</html>