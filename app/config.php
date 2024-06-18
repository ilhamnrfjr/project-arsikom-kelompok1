<?php
include_once("database.php");
include_once("ti.php");

// Mengambil data request
function Req()
{
    $rsef = explode("?", $_SERVER['REQUEST_URI']);
    $rsef = array_key_exists(1,$rsef) ? $rsef[1] : NULL;
    $Query_String  = explode("&", $rsef );
    $req = array();
    foreach($Query_String as $q){
        $b =  explode("=",$q);
        $req[$b[0]] = array_key_exists(1,$b) ? $b[1] : NULL;
    }
    return $req;
}

// Untuk base url utama
function url($uri=''){
    return "http://".$_SERVER['SERVER_NAME'].rtrim(dirname($_SERVER['PHP_SELF']), '/\\').'/'.$uri;
}

// UNtuk base directory utama
function basedir()
{
    return $_SERVER['DOCUMENT_ROOT'].rtrim(dirname($_SERVER['PHP_SELF']), '/\\').'/';
}

// Untuk redirect
function redirect($url)
{
    header('Location: '.$url);
    die;
}

// Untuk mengecek sudah login atau belum
function auth()
{
    if(!$_SESSION['user']){
        header('Location: '.url().'login');
    }
}

// Membuat format rupiah
function rupiah($angka){
    $rupiah = number_format($angka,0,',','.');
    return 'Rp. '. $rupiah;
}

?>