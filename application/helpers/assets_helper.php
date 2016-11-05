<?php
/*
 * Method to load dataTable into your project.
 */
if (!function_exists('loadDataTable')) {
    function loadDataTable()
    {
        $return = '<link type="text/css" rel="stylesheet" href="./assets/dataTables/media/css/jquery.dataTables.css" />' . PHP_EOL;
        $return .= '<script type="text/javascript" src="./assets/dataTables/media/js/jquery.dataTables.min.js"></script>' . PHP_EOL;
        $return .= '<script type="text/javascript" src="./assets/dataTables/dataTables.js"></script>' . PHP_EOL;
        return $return;
    }
}
/*
 * Method to load the shadowbox into your project.
 */
if (!function_exists('loadShadowbox')) {
    function loadShadowbox()
    {
        $return = '<link type="text/css" rel="stylesheet" href="./assets/shadowbox/shadowbox.css" />' . PHP_EOL;
        $return .= '<script type="text/javascript" src="./assets/shadowbox/shadowbox.js"></script>' . PHP_EOL;
        $return .= '<script type="text/javascript">' . PHP_EOL;
        $return .= 'Shadowbox.init();' . PHP_EOL;
        $return .= '</script>' . PHP_EOL;
        return $return;
    }
}
/*
 * Method to load 3DGallery into your project.
 */
if (!function_exists('load3DGallery')) {
    function load3DGallery()
    {
        $return = '<link type="text/css" rel="stylesheet" href="./assets/3DGallery/css/style.css" />' . PHP_EOL;
        $return .= '<script type="text/javascript" src="./assets/3DGallery/js/modernizr.custom.53451.js"></script>' . PHP_EOL;
        $return .= '<script type="text/javascript" src="./assets/3DGallery/js/jquery.gallery.js"></script>' . PHP_EOL;
        return $return;
    }
}

/*
 * Method to load dataTable into your project.
 */
if (!function_exists('loadJcarousel')) {
    function loadJcarousel(array $options = array())
    {
        $return = '<link rel="stylesheet" href="./assets/jcarousel/dist/core.css" />' . PHP_EOL;
        $jcarousel['mim'] = '<script type="text/javascript" src="./assets/jcarousel/dist/jquery.jcarousel.min.js"></script>' . PHP_EOL;
        $jcarousel['autoscroll'] = '<script type="text/javascript" src="./assets/jcarousel/dist/jquery.jcarousel.min.js"></script>' . PHP_EOL;

        $return .= $jcarousel['mim'];
        foreach ($options as $row) {
            $return .= $jcarousel[$row];
        }

        return $return;
    }
}

/*
 * Method to load dataTable into your project.
 */
if (!function_exists('loadCkeditor')) {
    function loadCkeditor()
    {
        return '<script src="./assets/ckeditor/ckeditor.js" type="text/javascript" charset="utf-8"></script>' . PHP_EOL;
    }
}

/*
 * Method to load validator lib into your project.
 */
if (!function_exists('loadValidator')) {
    function loadValidator()
    {
        $return = '<link rel="stylesheet" href="./assets/form-validator/style.css" />' . PHP_EOL;
        $return .= '<script src="./assets/form-validator/jquery.form-validator.js" type="text/javascript" charset="utf-8"></script>' . PHP_EOL;
        return $return;
    }
}

/*
 * Method to load masks lib into your project.
 */
if (!function_exists('loadMask')) {
    function loadMask()
    {
        $return = '<script src="./assets/jquery.mask/jquery.mask.min.js" type="text/javascript" charset="utf-8"></script>' . PHP_EOL;
        return $return;
    }
}
/*
 * Method to load masks lib into your project.
 */
if (!function_exists('loadGMaps')) {
    function loadGMaps()
    {
        $return = '<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=true&amp;libraries=places&amp;language=pt-br" type="text/javascript" charset="utf-8"></script>' . PHP_EOL;
        return $return;
    }
}