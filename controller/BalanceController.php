<?php 
require_once('../config/connection.php');

class Balance {
    private $account_balance = 'account_balance';

    private function fetchBalanceData($query) {
        global $mysqli;
        $data = array();
        $result = $mysqli->query($query);

        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }

        return $data;
    }

    public function getBalance() {
        $query = "SELECT * FROM {$this->account_balance}";
        $data = $this->fetchBalanceData($query);

        $response = array(
            'status' => 200,
            'data' => $data
        );

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function getSingleBalance($id) {
        $query = "SELECT * FROM {$this->account_balance} WHERE id_balance='$id'";
        $data = $this->fetchBalanceData($query);

        $response = array(
            'status' => 200,
            'data' => $data
        );

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
?>
