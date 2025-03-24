<?php
session_start();
include 'db_conn.php';

if (isset($_POST['itemId'])) {
    $itemId = $_POST['itemId'];
echo "$itemId";
    die();
    // Delete cart item from database
    $sql = "DELETE FROM cart_info WHERE productId = '$itemId'";
    if ($conn->query($sql) === TRUE) {
        echo "Item removed from cart successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid parameters.";
}

$conn->close();
?>
