<?php

session_start();

require_once("Classes/Connect.php");
require_once("Classes/DataBase.php");
require_once("Classes/Ads/GetAds.php");
require_once("Classes/Ads/DeleteAd.php");
require_once("Classes/Ads/PostAd.php");
require_once("Classes/Ads/PutAd.php");

$connect  = new Connect();
$getAds   = new ReadAds();
$deleteAd = new DeleteAd();
$postAd   = new CreateAd();
$putAd    = new PutAd();

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
}