<?php
if (!function_exists("encode")) {
    function encode($str)
    {
        return  $value = str_replace('=', '-', str_replace('/', '_', ($str)));
    }
}
if (!function_exists("decode")) {
    function decode($str)
    {
        return  $value = (str_replace('-', '=', str_replace('_', '/', $str)));
    }
}

?>