<?php
include("sql.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_id = intval($_POST['order_id']);
    $new_status = $_POST['status'];

    $allowed_statuses = ['Menunggu', 'Sedang Dikerjakan', 'Selesai Dikerjakan'];
    if (!in_array($new_status, $allowed_statuses)) {
        echo 'invalid_status';
        exit;
    }

    $stmt = $connect->prepare("UPDATE listorder SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $new_status, $order_id);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

    $stmt->close();
    $connect->close();
}
?>
