<?php
/*
*   <li class="nav-item">
        <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Current month
        </a>
    </li>
 */

function render_side_bar(){
    $dir = VIEW_DIR . 'blade/';
    $sidebar_li = '';
    foreach (glob($dir .'*.php') as $files){
        $filename = (strstr(pathinfo($files)['filename'], '.',true));
        $sidebar_li .= '<li class="nav-item">';
        $sidebar_li .= '<a class="nav-link" href="' . site_url('docs/' . $filename) . '">';
        $sidebar_li .= '<span data-feather="file-text"></span>';
        $sidebar_li .= $filename;
        $sidebar_li .= '</a>';
        $sidebar_li .= '</li>';
    }
    return $sidebar_li;
}

function render_side_bar2(){
    $dir = VIEW_DIR . 'blade/';
    $sidebar_li = '';
    foreach (glob($dir .'*.php') as $files){
        $filename = (strstr(pathinfo($files)['filename'], '.',true));
        $sidebar_li .= '<li>';
        $sidebar_li .= '<a href="' . site_url('docs/' . $filename) . '">';
        $sidebar_li .= '<span data-feather="file-text"> </span> ';
        $sidebar_li .= $filename;
        $sidebar_li .= '</a>';
        $sidebar_li .= '</li>';
    }
    return $sidebar_li;
}

function render_sidebar_menu()
{
    $menu = [

    ];
    return $menu;

}
