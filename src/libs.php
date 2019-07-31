<?php

namespace karteblanche\libs;

/* ________________________________________________CLASS */
/* \karteblanche\libs\libs::____________________________ */
/* _____________________________________________________ */

class libs {
    public static function define($protocol, $ndd, $path) {
        @DEFINE('DL_PROTOCOL', $protocol);
		@DEFINE('DL_NDD', $ndd);
        @DEFINE('DL_PATH', $path);
    }
	
    public static function css($url) {
        return "<link rel='stylesheet' href='$url'>";
    }
	
    public static function dynamicCss($name, $protocol, $ndd, $path, $security = null) {
        self::define($protocol, $ndd, $path);
        $dynamicCSS = json_decode(file_get_contents(DL_PROTOCOL.DL_NDD.DL_PATH.'public/rev-manifest.json', false, $security));
        return "<link rel='stylesheet' href='".DL_PROTOCOL.DL_NDD.DL_PATH."public/css/".$dynamicCSS->{$name.'.css'}."'>";
    }
    
    public static function js($url) {
        return "<script src='$url'></script>";
    }

    public static function dynamicJs($name, $protocol, $ndd, $path, $security = null) {
        self::define($protocol, $ndd, $path);
        $dynamicJS = json_decode(file_get_contents(DL_PROTOCOL.DL_NDD.DL_PATH.'public/rev-manifest.json', false, $security));
        return "<script src='".DL_PROTOCOL.DL_NDD.DL_PATH."public/js/".$dynamicJS->{$name.'.js'}."'></script>";
    }

}

?>
