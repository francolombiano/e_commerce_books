<?php


require_once "inc/functions.inc.php";


if (empty($_SESSION['user'])) {

    header("location:" . RACINE_SITE . "register.php");
}
