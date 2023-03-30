<?php 
$logo_id = get_field('logo_header', 'option');
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
  	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
	<?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
  	<?php wp_body_open(); ?>
    <header class="b_header">
      <div class="header_inner">
        <div class="top_header">
          <div class="top_block">
            <div class="container">
              <div class="top_header_inner flex row">
                <div class="logo_wrapper">
                  <a class="logo_link" href="<?php echo esc_url( home_url('/') ); ?>" rel="home">
                  
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
                <div class="desktop_contacts">
                  <div class="mobile_menu_btn">
                    <button class="menu_btn jsMenu" type="button">
                      <span class="button_title">меню</span>
                      <span class="menu_toggler">
                        <span class="toggler_top"></span>
                        <span class="toggler_middle"></span>
                        <span class="toggler_bottom"></span>
                      </span>
                    </button>
                  </div>

                  <?php get_template_part('template-parts/conracts', 'header'); ?>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bottom_header border20">
          <div class="container">
            <div class="bottom_header_inner flex row">
              <div class="mega_menu_btn">
                <button class="btn btn_green border20 jsMegaMenu" type="button">УСЛУГИ</button>
              </div>
              <div class="header_menu">
                <div class="header_menu_inner">
                  <div class="inner_wrapper">
                    <div class="mobile_contacts">
                      
						          <?php get_template_part('template-parts/conracts', 'header'); ?>

                    </div>
                    <div class="menu">
                      <?php
                        if ( has_nav_menu('menu_1') ) :
                          wp_nav_menu( [
                            'theme_location' => 'menu_1',
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

        <?php get_template_part('template-parts/mega', 'menu'); ?>
        
      </div>
    </header>
    <main>