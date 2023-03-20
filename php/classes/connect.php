<?php

require_once("DataBase.php");

class Connect {
    function __construct(){
        DataBase::connect();
    }
}