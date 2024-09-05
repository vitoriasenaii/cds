// src/Models/Transaction.php
<?php
class Transaction {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function logTransaction($item_type, $item_id, $user_id, $action) {
        $stmt = $this->db->prepare("INSERT INTO transactions (item_type, item_id, user_id, action) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$item_type, $item_id, $user_id, $action]);
    }
}
?>
