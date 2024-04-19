<?php

use app\helpers\Helper;

session_start();

include_once "../models/User.php";
include_once "../helpers/Helper.php";

$helper = new Helper();
$user = new app\models\User($helper);

$isAuthorized = $user->isAuthorized();
if ($isAuthorized) {
    $dir = getcwd();
    $dir = str_replace($_SERVER["DOCUMENT_ROOT"], "", $dir);
    $dir = str_replace("controllers", "", $dir);
    $url = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . $dir . "views/page.php";
} else {
    $url = $_SERVER["HTTP_REFERER"];
}
header('Location: ' . $url);
