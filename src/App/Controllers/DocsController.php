<?php

namespace App\Controllers;

defined('APPLICATION_DIR') OR exit('No direct Accesss here !');

use Core\Controller;
use Core\Libs\Request;
use Core\Libs\Support\Facades\Uri;
use Symfony\Component\Yaml\Yaml;
use Illuminate\Support\Facades\Storage;

class DocsController extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function docs($slug = "router")
    {
        $menu = $this->generateDocsSidebarMenu();
        $data['sidebar_menu'] = $menu['menu'];

        $data['prev'] = $menu['page']['prev']?? null;
        $data['next'] = $menu['page']['next'] ?? null;

        view('blade.' . $slug, $data);
    }

    /**
     * @param Uri $uri
     * @return string
     */
    protected function generateDocsSidebarMenu() : array
    {
        $array = Yaml::parseFile(STORAGE_DIR . '/menu.yaml');

        foreach ($array as $k => $v) {
            $menuArr[$v['weight']] = ['name'=> $v['name'],'url'=> $v['url']];
        }

        ksort($menuArr);

        $uriArray = array_column($menuArr, 'url');
        $key = array_search(Uri::uriString(), $uriArray);

        $prev = ($key>0) ? $uriArray[$key - 1] : null;
        $next = ($key<count($uriArray)-1) ? $uriArray[$key + 1] : null;
      //  dd($prev, $next);

        $sidebar_li = "";
        foreach ($menuArr as $key => $item) {
            $sidebar_li .= '<li>';
            $sidebar_li .= '<a href="' . site_url($item['url']) . '">';
//            $sidebar_li .= '<span data-feather=""> </span> ';
            $sidebar_li .= $item['name'];
            $sidebar_li .= '</a>';
            $sidebar_li .= '</li>';
        }

        return ['menu'=>$sidebar_li, 'page'=>['prev'=>$prev, 'next'=>$next]];
    }
}
