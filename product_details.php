<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Think Fish Aquatics</title>
    <link rel="stylesheet" href="style.css">

</head> 
<body>

    <section id="header">
     <img src="logo.gif"  width="120"  height="120"/>
    <p>Think Fish Aquatics</p>
     <div>
        <ul id="navbar">
            <li><a href="index.php" >Home</a></li>
            <li><a href="aquatic.php">Aquatic Panaroma</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </div>
</section>


<?php
include 'connection.php';

// Get product ID from the query parameter
if(isset($_GET['id'])) {
    $productId = $_GET['id'];
    
    // Query to retrieve product details by ID
    $query = "SELECT * FROM products WHERE id = $productId";
    $result = $connection->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<div style="text-align: center;">';
        echo '<img src="uploads/' . $row['image'] . '" width="300" height="300">';
        echo '<div class="des">';
        echo '<p style="font-size: 30px;">' . $row['name'] . '</p>';
        echo '<h5 style="font-size: 20px;">' . $row['description'] . '</h5>';
        echo '</div>'; // Close .des div
        echo '</div>';

        echo '<button class="p_button"><a href="edit_product.php?id=' . $row['id'] . '">Edit</a></button>';
        echo '<button class="p_button"><a href="delete_product.php?id=' . $row['id'] . '">Delete</a></button>';
        
    } else {
        echo 'Product not found.';
    }
} 
?>


<section id="contact">
    <div class="col">
        <img class="logo" src="logo.png" width="150"  height="150" style="display: block; margin: 0 auto;">
        <h4>Contact</h4>
        <p>Address: Dhaka, Bangladesh</p>
        <p>Phone: +8801754567367</p>
        <p>Email:<a href="malito:nirob16-615@diu.edu.bd">nirob16-615@diu.edu.bd</a></p>

        <div class="follow">
            <h4>Follow Us!</h4>
            <div class="socials">
          
                <img src="fb.png" width="70" height="70">
          
                <img src="twi.png" width="70" height="55">
            
                <img src="insta.jpeg" width="70" height="70">
            </div>
        </div>

 </section>

 <footer id="footer">
            <p>© Rakibul Hasan</p>
 </footer>
      
</body>
</html>