<?php
/*
 * Header Navigation template.
 * @package abovestate
 * 
*/ 

$menu_class = \Abovestate_Theme\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id( 'abovestate-header-menu' );

$header_menus = wp_get_nav_menu_items( $header_menu_id );

$navbarCount = 1;

?>

<nav class="navbar">
    <?php
      if(function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
      }
    ?>
    <button class="navbar__btn" id="navbarBtn">
      <img src="<?php echo get_template_directory_uri() . '/assets/images/menu.png' ?>" alt="" class="navbar__btn-img">
    </button>
    <div class="navbar__inner" id="navbarInner">
      <?php 
        if( ! empty( $header_menus ) && is_array( $header_menus ) ){
          ?>
          <ul class="navbar__list">

            <?php 
              foreach ($header_menus as $menu_item ) {
                if( ! $menu_item->menu_item_parent ) {

                  $child_menu_items = $menu_class->get_child_menu_items( $header_menus, $menu_item->ID );
                  $has_children = ! empty( $child_menu_items ) && is_array( $child_menu_items );

                  if ( ! $has_children ) {
                    ?>
                    <li class="navbar__item">
                      <a class="navbar__link" href="<?php echo esc_url( $menu_item->url ); ?>">
                        <?php echo esc_html( $menu_item->title ); ?>
                      </a>
                    </li>
                    <?php
                  } else {
                    ?>
                    <li class="navbar__item dropdown">
                      <a class="navbar__link dropdown__inner" href="<?php echo esc_url( $menu_item->url ); ?>" id="<?php echo 'navbarDropdown' . $navbarCount ?>">
                        <?php echo esc_html( $menu_item->title ); ?>
                      </a>
                      <div class="dropdown__menu" id="<?php echo 'navbarDropdownList' . $navbarCount ?>">
                        <?php 
                          foreach( $child_menu_items as $child_menu_item ) {
                            ?>
                            <a class="dropdown__item" href="<?php echo esc_url( $child_menu_item->url ); ?>"><?php echo esc_html( $child_menu_item->title ); ?></a>
                            <?php
                          }
                          $navbarCount++;
                        ?>
                      </div>
                    </li>
                    <?php
                  }
                  ?>
                  
                  <?php
                }
              }
            ?>  
          </ul>
          <?php

        }
        

      ?>
      <form class="header__form" role="search">
        <input class="header__form-inp" type="search" placeholder="Search">
        <button class="header__form-btn" type="submit">Search</button>
      </form>
    </div>
</nav>
