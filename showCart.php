<?php
session_start();

// Include the database connection file
include 'db_conn.php';

// Query the database
$sql = "SELECT * FROM cart_info";
$result = $conn->query($sql);

// Fetch all products and store them in an array
$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

$conn->close();
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .cart-container {
            position: fixed;
            align-items: center;
            bottom: 20px;
            right: 70px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 999;
            max-height: 500px; /* Limit cart height */
            overflow-y: auto; /* Enable scrolling if items exceed cart height */
        }

        .cart-item {
            margin-bottom: 10px;
            border-bottom: 1px solid #ddd; /* Add bottom border between cart items */
            display: flex;
            align-items: center;
        }

        .cart-item img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .cart-total {
            width: 350px;
            height: 500;
            font-weight: bold;
            margin-top: 10px;
            text-align: center;
        }

        .expand-cart {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
            .remove-btn {
                background-color: #ff4c4c;
                color: white;
                border: none;
                padding: 5px 10px;
                border-radius: 10px;
                cursor: pointer;
                align-items: right;
            }
            .remove-btn:hover {
                background-color: #ff3333;
            }
    </style>
    <div class="cart-container" id="cartContainer">
    <h2>Shopping Cart</h2>
    <?php foreach ($products as $product): ?>
        <div class="cart-total" id="cartTotal"></div>
        <div class="cart-item">
                <img src="<?php echo $product['productImage']; ?>" alt="${productName}">
                <span class="cart-item-name">${productName} - $${productPrice}</div>
            </span>
        <button class="remove-btn" onclick="removeFromCart(this)">Remove</button>
        <?php endforeach; ?>
    </div>
</body>
</html>