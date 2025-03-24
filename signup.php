<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="sign">
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
    <div class="container">
        <h1>Think Fish Aquatics</h1>
        <form action="signup_process.php" method="post"> 
            <label for="fullname">Name:</label>
            <input type="text" id="fullname" name="fullname" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="submit" class="signup-button">Sign Up</button>

            <p class="login-text">Already have an account? <a href="login.php">Log in</a></p>
        </form>
    </div>

    <section id="contact">
        <div class="col">
            <img class="logo" src="logo.png" width="300"  height="300">
            <h4>Contact</h4>
            <p>Address: Dhaka, Bangladesh</p>
            <p>Phone: +8801754567367</p>
            <p>Email:<a href="mailto:nirob16-615@diu.edu.bd">nirob16-615@diu.edu.bd</a></p> <!-- Fixed mailto link -->
    
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
    
    <footer id="footer">
        <p>© Rakibul Hasan</p>
    </footer>
</body>
</html>
