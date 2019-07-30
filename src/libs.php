<?php

namespace kb-dyanmiclibs;

/* ________________________________________________CLASS */
/* \kb-dynamiclibs\libs::_______________________________ */
/* _____________________________________________________ */

class libs {
    public static function define($ndd, $path) {
        @DEFINE('DL_NDD', $ndd);
        @DEFINE('DL_PATH', $path);
    }

    public static function dynamicCss($name, $ndd, $path) {
        self::define($ndd, $path);
        $dynamicCSS = json_decode(file_get_contents('http://'.DL_NDD.DL_PATH.'public/rev-manifest.json'));
        return "<link rel='stylesheet' href='http://".DL_NDD.DL_PATH."public/css/".$dynamicCSS->{$name.'.css'}."'>";
    }
    
    public static function js($url) {
        return "<script src='$url'></script>";
    }

    public static function dynamicJs($name, $ndd, $path) {
        self::define();
        $dynamicJS = json_decode(file_get_contents('http://'.DL_NDD.DL_PATH.'public/rev-manifest.json'));
        return "<script src='http://".DL_NDD.DL_PATH."public/js/".$dynamicJS->{$name.'.js'}."'></script>";
    }

}

?>