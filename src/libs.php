<?php

namespace karteblanche\libs;

/* ________________________________________________CLASS */
/* \karteblanche\libs\libs::____________________________ */
/* _____________________________________________________ */

class libs {	
    public static function css($url) {
        return "<link rel='stylesheet' href='$url'>";
    }
	
    public static function dynamicCss($name, $protocol, $ndd, $path, $security = null) {
        $dynamicCSS = json_decode(file_get_contents($protocol.$ndd.$path.'public/rev-manifest.json', false, $security));
        return "<link rel='stylesheet' href='".$protocol.$ndd.$path."public/dynCss/".$dynamicCSS->{$name.'.css'}."'>";
    }
    
    public static function js($url) {
        return "<script src='$url'></script>";
    }

    public static function dynamicJs($name, $protocol, $ndd, $path, $security = null) {
        $dynamicJS = json_decode(file_get_contents($protocol.$ndd.$path.'public/rev-manifest.json', false, $security));
        return "<script src='".$protocol.$ndd.$path."public/dynJs/".$dynamicJS->{$name.'.js'}."'></script>";
    }

}

?>
