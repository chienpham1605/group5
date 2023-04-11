<?php

function get_info_cat($cat_id){
    global $list_product_cat;
    if(array_key_exists($cat_id, $list_product_cat )){
        return $list_product_cat[$cat_id];
    }
    else
    return false;
}

function get_list_product_by_cat_id($cat_id){
    $list_item = db_fetch_array("SELECT * FROM `book` WHERE cat_id = '{$cat_id}'");

    foreach ($list_item as &$item){
        $item['url_detail'] = "?mod=product&act=detail&id={$item['book_id']}";
        $item['url_add_cart'] = "?mod=cart&act=add&id={$item['book_id']}";
    }
    return $list_item;
}

function get_product_by_id($id){
    // global $list_product;
    // if(array_key_exists($id, $list_product)){
    //     $list_product[$id]['url_add_cart'] = "?mod=cart&act=add&id={$id}";
    //     $list_product[$id]['url'] = "?mod=product&act=detail&id={$id}";
    //     return $list_product[$id];
    // }
    $item = db_fetch_row("SELECT * FROM `book` WHERE book_id = '{$id}'");
    $item['url_detail'] = "?mod=product&act=detail&id={$item['book_id']}";
        $item['url_add_cart'] = "?mod=cart&act=add&id={$item['book_id']}";
    return $item;

}
