<?php
require_once("classes/DataBaseSaleBoard.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id"])) {
        echo "Один пользователь";
    } else {
        echo "Все пользователи";
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Создать пользователя";
} elseif ($_SERVER["REQUEST_METHOD"] == "PUT") {
    echo "Обновить пользователя";
} elseif ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    echo "Удалить пользователя";
} 
