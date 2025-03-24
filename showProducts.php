<?php
session_start();

// Include the database connection file
include 'db_conn.php';

// Query the database
$sql = "SELECT * FROM product_info";
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
    <title>Product Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .products {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .product {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            width: calc(33.33% - 25px); /* Adjust this value for responsiveness */
            box-sizing: border-box;
            text-align: center;
            transition: transform 0.3s ease;
        }
        .product:hover {
            transform: translateY(-5px);
        }
        .product img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        .product h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .product p {
            font-size: 16px;
            margin-bottom: 15px;
        }
        .product button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .product button:hover {
            background-color: #45a049;
        }
        /* Your existing CSS styles */

/* Cart container styles */
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

</head>
<body>

<div class="container">
    <h1>Products</h1>
    <div class="products">
    <?php foreach ($products as $product): ?>
        <div class="product">
            <img src="<?php echo $product['productImage']; ?>" alt="<?php echo $product['productName']; ?>">
            <h2><?php echo $product['productName']; ?></h2>
            <p>$<?php echo $product['productPrice']; ?></p>
            <!-- Ensure productId is passed as a string -->
            <button onclick="addToCart('<?php echo $product['productId']; ?>', '<?php echo $product['productName']; ?>', '<?php echo $product['productPrice']; ?>')">Add to Cart</button>
        </div>
    <?php endforeach; ?>
    </div>
</div>

<div class="cart-container" id="cartContainer">
    <h2>Shopping Cart</h2>
    <div id="cartItems"></div>
    <div class="cart-total" id="cartTotal"></div>
</div>

<!-- Expandable floating cart button -->
<button class="expand-cart" id="expandCartBtn" onclick="toggleCart()">Cart</button>


<script>
    // Function to toggle the cart visibility
    function toggleCart() {
        var cartContainer = document.getElementById('cartContainer');
        cartContainer.style.display = cartContainer.style.display === 'none' ? 'block' : 'none';
    }

    // Function to add an item to the cart
    function addToCart(productId, productName, productPrice) {
        var cartItems = document.getElementById('cartItems');
        var cartTotal = document.getElementById('cartTotal');

        var cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');
        cartItem.innerHTML = `
            <div class="cart-item-info">
                <img src="<?php echo $product['productImage']; ?>" alt="${productName}">
                <span class="cart-item-name">${productName} - $${productPrice}</div>
            </span>
            <button class="remove-btn" onclick="removeFromCart(this)">Remove</button>
        `;

        cartItems.appendChild(cartItem);

        var totalPrice = parseFloat(cartTotal.textContent.replace('Total: $', '')) || 0;
        totalPrice += parseFloat(productPrice);
        cartTotal.textContent = 'Total: $' + totalPrice.toFixed(2);

        // Send data to server using AJAX 
        function addToCartInfo(productId, productName, productPrice) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "addToCart.php", true);
                
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    console.log(xhr.responseText); // Log server response
                }
            };
        
            // Prepare data to send in the request body
            var formData = new FormData();
            formData.append("productId", $productId);
            formData.append("productName", $productName);
            formData.append("productPrice", $productPrice);
        
            xhr.send(formData);
        }

        addToCartInfo(productId, productName, productPrice);
    }

    // Function to remove an item from the cart
    function removeFromCart(button) {
        var cartItem = button.parentNode;
        var cartItems = cartItem.parentNode;
        var cartTotal = document.getElementById('cartTotal');

        var price = parseFloat(cartItem.querySelector('.cart-item-name').textContent.split('-')[1].trim().replace('$', ''));
        var totalPrice = parseFloat(cartTotal.textContent.replace('Total: $', ''));
        totalPrice -= price;

        cartItems.removeChild(cartItem);
        cartTotal.textContent = 'Total: $' + totalPrice.toFixed(2);

        // Send data to server using AJAX 
        function removeFromCartInfo(itemId) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "removeFromCart.php", true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    console.log(xhr.responseText); // Log server response
                }
            };
            xhr.send(cartItem);
        }
        removeFromCartInfo(itemId);

}
</script>

</body>
</html>
