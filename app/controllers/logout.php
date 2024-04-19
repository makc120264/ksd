<?php

use app\helpers\Helper;

include_once "../models/User.php";
include_once "../helpers/Helper.php";

$helper = new Helper();
$user = new app\models\User($helper);
$isAuthorized = $user->isAuthorized();
if ($isAuthorized) {
    $user->logout();
}
$dir = getcwd();
$dir = str_replace($_SERVER["DOCUMENT_ROOT"], "", $dir);
$dir = str_replace("controllers", "", $dir);
$url = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . $dir . "views/login.php";

header('Location: ' . $url);
