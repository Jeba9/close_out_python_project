<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Blog</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<section id="header">
  <img src="logo.gif" width="120" height="120"/>
  <p>Think Fish Aquatics</p>
  <div>
    <ul id="navbar">
      <li><a href="index.php">Home</a></li>
      <li><a href="aquatic.php">Aquatic Panaroma</a></li>
      <li><a href="blog.html">Blog</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="profile.php">Profile</a></li>
      <li><a href="login.php">Log In</a></li>
    </ul>
  </div>
</section>

<section id="banner">
  <h2>Want to Suggest Something</h2>
  <button class="normal" onclick="window.location.href='addblog.php'">Post Suggestion</button>
</section>




<div class="blogcontainer">
        <table class="blogtable">
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th></th>
            </tr>
     
     
            <?php
            include 'connection.php';

            // Retrieve blog posts from the database
            $query = "SELECT post_id, title, content FROM blog_posts";
            $result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['title']}</td>";
                echo "<td>{$row['content']}</td>";
                echo "<td> <button button class='blogbutton'> <a href='deleteblog.php?post_id={$row['post_id']}'>Delete</a> </button>
                <button button class='blogbutton'> <a href='updateblog.php?post_id={$row['post_id']}'>Edit</a> </button> </td>";
                echo "</tr>";
            } 

            mysqli_close($connection);
            ?>
      
    </table>
</div>








<section id="contact">
  <div class="col">
    <img class="logo" src="logo.png" width="300" height="300">
    <h4>Contact</h4>
    <p>Address: Dhaka, Bangladesh</p>
    <p>Phone: +8801754567367</p>
    <p>Email: <a href="mailto:nirob16-615@diu.edu.bd">nirob16-615@diu.edu.bd</a></p>

    <div class="follow">
      <h4>Follow Us!</h4>
      <div class="socials">
        <img src="fb.png" width="70" height="70">
        <img src="twi.png" width="70" height="50">
        <img src="insta.jpeg" width="70" height="70">
      </div>
    </div>
  </div>
</section>

</body>
</html>
