<?php
/**
 *
 *  @see \Core\Libs\Url
 */
use Core\Libs\Url;

if (!function_exists('url')) {
    /**
     * @method static Core\Libs\Url full()
     * @param null $uri
     * @return \Core\Libs\Url
     */
    function url($uri = null){

        $url = app(Url::class);

        if(!$uri){
            return $url;

        } else {
            return $url->getSiteUrl($uri);

        }

    }
}


if (!function_exists('valid_url')) {
    /**
     * @param $url
     * @return mixed
     */
    function valid_url($url)
    {
        return app(Url::class)->isValidUrl($url);
    }
}

if (!function_exists('site_url')) {
    /**
     * Връща пълния URL
     * @param null $uri
     * @return mixed
     */
    function site_url($uri = null)
    {
        return app(Url::class)->getSiteUrl($uri);
    }
}

if (!function_exists('assets_url')) {

    function assets_url($uri = null)
    {
        $uri = ($uri) ?   '/' . $uri : '';

        return app(Url::class)->getSiteUrl('assets') . $uri;
    }
}
