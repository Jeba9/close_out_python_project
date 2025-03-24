<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="log">
  <section id="header">
    <img src="logo.gif" width="120" height="120" />
    <p>Think Fish Aquatics</p>
    <div>
      <ul id="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a href="aquatic.php">Aquatic Panaroma</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="about.php">About</a></li>
      </ul>
    </div>
  </section>

  <div class="container">
    <h1>Think Fish Aquatics</h1>

    <form action="login_process.php" method="post" class="form-group">
      <label for="email">Email Address:</label>
      <input type="email" class="form-control" id="email" name="email" required>

      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" name="password" required>

      <button type="submit" class="login-button btn btn-primary">Login</button>
    </form>

    <p class="login-text">Don't have an account? <a href="signup.php">Sign up</a></p>
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

  <footer id="footer">
    <p>© Rakibul Hasan</p>
  </footer>
</body>
</html>
