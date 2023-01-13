<?php

session_start();

require_once("classes/connect.php");
require_once("classes/DataBase.php");
require_once("classes/ads/getAds.php");
require_once("classes/ads/deleteAd.php");
require_once("classes/ads/postAd.php");
require_once("classes/ads/putAd.php");

$connect  = new connect();
$getAds   = new readAds();
$deleteAd = new deleteAd();
$postAd   = new createAd();
$putAd    = new putAd();

if ($_SERVER["REQUEST_METHOD"] == "GET") { // Получить объявление с id = ... или все объявления или объявления по id юзера. 
    $getAds->getAds();
} else if ($_SERVER["REQUEST_METHOD"] == "POST") { //Создать объявление если заполненны все поля, кроме picture
    if ($_REQUEST["method"] == "POST") {
        $postAd->postAd();
    }else{
        $putAd->updateAd();
    }
} else if ($_SERVER["REQUEST_METHOD"] == "DELETE") { // Удалить объявление с id = ...
    $deleteAd->delete();
/* } else if ($_REQUEST["method"] == "PUT") { //Обновить данные объявления с id = ...
    $putAd->updateAd(); */
}