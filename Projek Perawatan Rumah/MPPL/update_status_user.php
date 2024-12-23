<?php
include("sql.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['status'])) {
    $id = intval($_POST['id']);
    $status = htmlspecialchars($_POST['status']);

    $sql = "UPDATE listorder SET status = ? WHERE id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("si", $status, $id);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

    $stmt->close();
    $connect->close();
} else {
    echo 'invalid_request';
}
?>
