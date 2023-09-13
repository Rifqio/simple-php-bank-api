<?php
require_once('../config/connection.php');

class Transfer {
    private $account_transfer = 'account_transfer';
    private $account_balance = 'account_balance';

    public function transferMoney($from_user_id, $to_user_id, $amount) {
        if ($this->hasSufficientBalance($from_user_id, $amount)) {

            $this->deductBalance($from_user_id, $amount);
            $this->addBalance($to_user_id, $amount);
            $this->recordTransfer($from_user_id, $to_user_id, $amount);

            $response = array(
                'status' => 200,
                'message' => 'Transfer Success!'
            );
        } 
        else {
            $response = array(
                'status' => 400,
                'message' => 'Insufficient balance'
            );
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    private function hasSufficientBalance($user_id, $amount) {
        global $mysqli;
        $query = "SELECT balance FROM {$this->account_balance} WHERE user_id = $user_id";
        $result = $mysqli->query($query);
        $row = $result->fetch_assoc();
        
        return ($row && $row['balance'] >= $amount);
    }

    private function deductBalance($user_id, $amount) {
        global $mysqli;
        $deductBalance = "UPDATE {$this->account_balance} SET balance = balance - $amount WHERE user_id = $user_id";
        $mysqli->query($deductBalance);
    }

    private function addBalance($user_id, $amount) {
        global $mysqli;
        $addBalance = "UPDATE {$this->account_balance} SET balance = balance + $amount WHERE user_id = $user_id";
        $mysqli->query($addBalance);
    }

    private function recordTransfer($from_user_id, $to_user_id, $amount) {
        global $mysqli;
        $insertBalance = "INSERT INTO {$this->account_transfer} (from_account, to_account, amount, created_at) VALUES ('$from_user_id', '$to_user_id', '$amount', NOW())";
        $mysqli->query($insertBalance);
    }
}
?>
