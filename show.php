<?php
// Start the session
session_start();

include 'db_conn.php';

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    // If not logged in, redirect to login page
    header("Location: login.html");
    exit;
}

// Get user details from session
$user = $_SESSION['user'];

// Extract user information
$firstName = $user['firstName'];
$lastName = $user['lastName'];
$email = $user['email'];
$phone = $user['phone'];
$password = $user['password'];
$address = $user['address'];
?>

<section>
    <div class="container">
        <div class="sign-up-form py-4">
            <h3>Please Enter Your Information</h3>
            <div class="form-wrapper">
            <section>
                <form action="update.php" method="POST">
                    <div class="row text-left">
                        
                            <div class="col-md-6">
                                <label for="firstName">First Name </label>
                                <input class="form-control" type="text" id="firstName" name="firstName" required value="<?php echo "$firstName"; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="lastName">Last Name</label>
                                <input class="form-control" type="text" id="lastName" name="lastName" required value="<?php echo "$lastName"; ?>">
                            </div>
                            <div class="col-md-6 py-3">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" id="email" name="email" required value="<?php echo "$email"; ?>">
                            </div>
                            <div class="col-md-6 py-3">
                                <label for="phone">Phone</label>
                                <input class="form-control" type="tel" id="phone" name="phone" required value="<?php echo "$phone"; ?>">
                            </div>
                            <div class="col-md-12 py-3">
                                <label for="address">Address</label>
                                <input class="form-control" id="address" name="address" rows="4" cols="50" required value="<?php echo "$address"; ?>">
                            </div>
                            <div class="col-md-6 py-3">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" id="password" name="password" required value="<?php echo "$password"; ?>">
                            </div>
                            <div class="submit-btn p-3 m-0 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                    </section>
                </div>
        </div>
    </div>
</section>

<section class="cta">
    <h1>we are appreciating you to join us as members.</h1>
</section>
    
