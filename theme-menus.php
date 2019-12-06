<?php

// Register Menus
function register_theme_menus() {
    register_nav_menus(
        array(
            'primary-menu' => __( 'Primary Menu' ),
            'thumbnail-menu' => __( 'Thumbnail Menu' )
        )
    );
}
add_action( 'init', 'register_theme_menus');

// Custom Menus
class Menu_With_Description extends Walker_Nav_Menu {

  function start_el(&$output, $item, $depth, $args) {
      global $wp_query;

      $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
      $class_names = $value = '';

      $classes = empty( $item->classes ) ? array() : (array) $item->classes;

      $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
      $class_names = ' class="' . esc_attr( $class_names ) . '"';

      $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value .'>';

      $attributes  = !empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
      $attributes .= !empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
      $attributes .= !empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
      $attributes .= !empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

      $post = get_post($item->object_id);
      $desc = !empty($post) ? wp_trim_words($post->post_content, 20) : "";


      $item_output  = $args->before;
      $item_output .= '<a'. $attributes . $class_names .'>';
      $item_output .= $args->link_before . '<h3>' . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
      $item_output .= '</h3><p class="sub">' .($item->description==''? $desc:$item->description). '</p>';
      $item_output .= '</a>';
      $item_output .= $args->after;

      $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

  }
}

class Menu_With_Link_Classes extends Walker_Nav_Menu {

    function start_el(&$output, $item, $depth, $args) {
        global $wp_query;

        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $fa_icon = '';

        for ($i=count($classes)-1; $i>=0; $i--) {
          $mn_class = $classes[$i];
          if (substr($mn_class, 0, 3) == 'fa-') {
            $fa_icon = $mn_class;
            unset($classes[$i]);
            break;
          }
        }

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="nav-link ' . esc_attr( $class_names ) . '"';

        $output .= $indent . '<li class="nav-item" id="menu-item-'. $item->ID . '"' . $value .'>';

        $attributes  = !empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= !empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
        $attributes .= !empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
        $attributes .= !empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

        $item_output  = $args->before;
        $item_output .= '<a'. $attributes . $class_names .'>';
        $item_output .= '<div class="nav-title">';
        $item_output .= $args->link_before;
        $item_output .= apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</div>';
        $item_output .= '<div class="nav-collapse"><i class="fa '.$fa_icon.'"></i></div>';
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

    }
}

?>
