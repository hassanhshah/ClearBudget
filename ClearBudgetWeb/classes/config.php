<?php

$db_user = "clearets_user";
$db_pass = "roots";
$db_name = "clearets_clearbudget";

$db = new PDO('mysql:host=localhost;dbname='. $db_name . ';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
