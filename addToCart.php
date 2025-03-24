<?php
include 'db_conn.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST["productId"];
    $productName = $_POST["productName"];
    $productPrice = $_POST["productPrice"];

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO cart (productId, productName, productPrice) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $productId, $productName, $productPrice);

    // Execute SQL statement
    if ($stmt->execute()) {
        echo "Item added to cart successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
} else {
    echo "Invalid parameter";
}

// Close connection
$conn->close();
?>
