<?php

use app\helpers\Helper;
use app\models\User;

session_start();

$publicDir = str_ireplace($_SERVER["DOCUMENT_ROOT"], "", __DIR__);
$appDir = str_ireplace('public', 'app', $publicDir);

include_once $_SERVER["DOCUMENT_ROOT"] . "$appDir/models/User.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "$appDir/helpers/Helper.php";

$helper = new Helper();
$user = new User($helper);

$isAuthorized = $user->isAuthorized();
if ($isAuthorized) {
    $dir = getcwd();
    $dir = str_replace($_SERVER["DOCUMENT_ROOT"], "", $dir);
    $url = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . $appDir . "/views/page.php";
} else {
    $url = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . $appDir . "/views/login.php";
}
header('Location: ' . $url);
