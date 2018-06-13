<div id="sidebar">

<h6 class="sidebar-header">Продукция</h6>

<?php
$menu = wp_nav_menu( array(
  'theme_location'  => 'sidebar',
  'container'       => 'div',
  'container_class' => '',
  'container_id'    => '',
  'menu_class'      => 'menu nav flex-column',
  'fallback_cb'     => 'wp_page_menu',
  'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
  'depth'           => 2,
  'echo' => 0
) );
$menu = str_replace('class="menu-item', 'class="menu-item nav-item', $menu);
$menu = str_replace('<a', '<a class="nav-link"', $menu);
echo $menu;
?>

</div>