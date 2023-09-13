<?php
require_once "../controller/BalanceController.php";

$balance = new Balance();
$request_method = $_SERVER["REQUEST_METHOD"];

if ($request_method === 'GET') {
    if (!empty($_GET["id"])) {
        $id = intval($_GET["id"]);
        $balance->getSingleBalance($id);
    } else {
        $balance->getBalance();
    }
} else {
    header("HTTP/1.0 405 Method Not Allowed");
}
