<?php
/**
 * check whether menu item is a child of context clicked menu on top-menu item.
 *
 * @param int $object_id of menu item
 * @author Rick Nguyen
 * @return true if child and false in else case
 */
function is_child_of_top_menu($object_id){
    global $wpdb;
    $data = get_all_posts_type_menu();
    $parent_id = get_parent_id_from_array($data, $object_id);
    $session_top_menu = $_SESSION['$session_top_menu'];
    while ($parent_id != 0) {
        if (get_post_name_from_array($data, $parent_id) === $session_top_menu) {
            return true;
        }
        $parent_id = get_parent_id_from_array($data, $parent_id);
    }
    return false;
}
/**
 * get all post from database.
 *
 * @author Rick Nguyen
 * @return all post indatabase
 */
function get_all_posts_type_menu(){
    global $wpdb;
    $data  = $wpdb->get_results(
        "select * from $wpdb->posts where post_type in ('nav_menu_item', 'page'); "
    );
    return $data;
}
/**
 * get parent id from app posts array
 *
 * @author Rick Nguyen
 * @return parent id
 */
function get_parent_id_from_array($post_array_list, $ID){
    foreach ($post_array_list as $item){
        if($item->ID == $ID){
            return (int)$item->post_parent;
        }
    }
}
/**
 * get post name from array
 *
 * @author Rick Nguyen
 * @return post name
 */
function get_post_name_from_array($post_array_list, $ID){
    foreach ($post_array_list as $item){
        if($item->ID == $ID){
            return $item->post_name;
        }
    }
}