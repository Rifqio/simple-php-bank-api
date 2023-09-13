<?php
require_once "../controller/TransferController.php";

$transfer = new Transfer();
$request_method = $_SERVER["REQUEST_METHOD"];

if ($request_method === 'POST') {
    $json_input = file_get_contents('php://input');
    $data = json_decode($json_input, true);

    if (isset($data['from']) && isset($data['to']) && isset($data['amount'])) {
        $from_user_id = intval($data['from']);
        $to_user_id = intval($data['to']);
        $amount = intval($data['amount']);

        $transfer->transferMoney($from_user_id, $to_user_id, $amount);
    } else {
        header("HTTP/1.0 400 Bad Request");
        echo json_encode(array('message' => 'Missing mandatory payload'));
    }
} else {
    header("HTTP/1.0 405 Method Not Allowed");
}
?>
