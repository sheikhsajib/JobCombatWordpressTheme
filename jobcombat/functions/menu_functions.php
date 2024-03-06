<?php
//For adding Menu ul li Class
function add_additional_class_on_li($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
//For adding Menu ul li Class
function add_additional_class_on_li_has_children($classes, $item, $args)
{
    if (isset($args->add_li_class_has_children) && in_array('menu-item-has-children', $item->classes)) {
        $classes[] = $args->add_li_class_has_children;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li_has_children', 1, 3);
function add_additional_class_on_a($atts, $item, $args)
{
    if (isset($args->add_a_class)) {
        $atts['class'] = isset($atts['class']) ? $atts['class'] . ' ' . $args->add_a_class : $args->add_a_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);


function add_additional_class_on_dropdown_a($atts, $item, $args)
{
    if (isset($args->add_a_dorpdown_class) && in_array('menu-item-has-children', $item->classes)) {
        $atts['class'] .= ' ' . $args->add_a_dorpdown_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_additional_class_on_dropdown_a', 1, 3);

function add_additional_id_on_dropdown_a($atts, $item, $args)
{
    if (isset($args->add_a_dorpdown_id) && in_array('menu-item-has-children', $item->classes)) {
        $atts['id'] = isset($atts['id']) ? $atts['id'] . ' ' . $args->add_a_class : $args->add_a_dorpdown_id;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_additional_id_on_dropdown_a', 1, 3);

function add_additional_attr_on_a($atts, $item, $args)
{
    if (isset($args->add_a_attr) && in_array('menu-item-has-children', $item->classes)) {
        $atts['data-bs-toggle'] = 'dropdown';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_additional_attr_on_a', 1, 3);

//For adding class in Menu>ul>li>ul tag
function add_additional_class_on_ul($classes, $args, $depth)
{
    if (isset($args->add_ul_class)) {
        $classes[] = $args->add_ul_class;
    }
    return $classes;
}
add_filter('nav_menu_submenu_css_class', 'add_additional_class_on_ul', 1, 3);

function add_additional_class_on_submenu_a($atts, $item, $args)
{
    if (isset($args->add_submenu_a_class) && in_array('menu-item-has-children', $item->classes)) {
        $atts['class'] .= ' ' . $args->add_submenu_a_class;
    }
    if (isset($args->add_submenu_a_class) && in_array('menu-item-has-children', $item->classes)) {
        $atts['class'] .= ' ' . $args->add_submenu_a_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_additional_class_on_submenu_a', 1, 3);
