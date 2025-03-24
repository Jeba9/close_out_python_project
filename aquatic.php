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

// Query to retrieve products from the database
$query = "SELECT * FROM products";
$result = $connection->query($query);

if ($result->num_rows > 0) {
    echo '<section id="product1" class="section-p1">';
    echo '<h2>Aquatic Panoroma</h2>';
    echo '<div class="pro-container">';
    
    while ($row = $result->fetch_assoc()) {
        echo '<div class="pro">';
        echo '<img src="uploads/' . $row['image'] . '" width="170" height="170">';
        echo '<div class="des">';
        echo '<p>' . $row['name'] . '</p>';
        // Limit the description length to 100 characters
        $description = $row['description'];
        $limited_description = strlen($description) > 10 ? substr($description, 0, 10) . '...' : $description;
        echo '<h5>' . $limited_description . '</h5>';
        
        // If description is longer than 100 characters, show "Read More" link
        if (strlen($description) > 10) {
            echo '<a href="product_details.php?id=' . $row['id'] . '" class="read-more" style="font-size: 16px; color: black;">Read More</a>';

        }
        echo '</div>';
        echo '</div>';
    }
    
    echo '</div>';
    echo '</section>';
} else {
    echo 'No products found.';
}
?>


<section id="banneraquatic">
  <h2>Add Product Information</h2>
  <button class="normal" onclick="window.location.href='addpanaroma.php'">ADD</button>
</section>




<section id="contact">
    <div class="col">
        <img class="logo" src="logo.png" width="300"  height="300">
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