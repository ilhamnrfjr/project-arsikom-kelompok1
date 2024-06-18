<?php
session_start();
include_once("app/config.php");

$getrl = array_key_exists("url",$_GET) ? $_GET['url'] : '';
$url = rtrim($getrl,'/');
$url = filter_var($url, FILTER_SANITIZE_URL);

switch ($url) {
    case 'login':
        include('view/auth/login.php');
        break;
        case 'register':
            include('view/auth/register.php');
            break;
    case 'logout':
        include('view/auth/logout.php');
        break;
    case '':
        auth();
        include('view/dashboard.php');
        break;
    case 'setting':
        auth();
        include('view/setting.php');
        break;
    case 'mahasiswa':
        auth();
        include('view/mahasiswa.php');
        break;
    case 'mahasiswa/create':
        auth();
        include('view/mahasiswa-create.php');
        break;
    case 'mahasiswa/edit':
        auth();
        include('view/mahasiswa-edit.php');
        break;
    case 'dosen':
        auth();
        include('view/dosen.php');
        break;
    case 'dosen/create':
        auth();
        include('view/dosen-create.php');
        break;
    case 'dosen/edit':
        auth();
        include('view/dosen-edit.php');
        break;
    case 'matkul':
        auth();
        include('view/matkul.php');
        break;
    case 'matkul/create':
        auth();
        include('view/matkul-create.php');
        break;
    case 'matkul/edit':
        auth();
        include('view/matkul-edit.php');
        break;
    case 'jadwal':
        auth();    
        include('view/jadwal.php');
            break;
        case 'jadwal/create':
            auth();
            include('view/jadwal-create.php');
            break;
        case 'jadwal/edit':
            auth();
            include('view/jadwal-edit.php');
            break;
    default:
        include('view/404.php');
        break;
}
