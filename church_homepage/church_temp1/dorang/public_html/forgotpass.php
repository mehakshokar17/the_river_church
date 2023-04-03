<!DOCTYPE html>
<html lang="en">
<html lang="en">
<?php
include_once 'database.php';
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fp.css">
    <script src="https://www.gstatic.com/firebasejs/9.0.2/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.0.2/firebase-auth-compat.js"></script>
    <title>Forgot Password</title>
    <style>

    </style>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form method="POST" action="#">
                <h1>Forgot Password</h1>
                <p>Enter your email below and we'll send you a link to reset your password.</p>
                <input type="email" name="email"placeholder="Email" />
                <input type="text" name="pass"  placeholder="New Password"> 
                <button name="reset" type="submit">Reset Password</button>
                <?php
                if (isset($_POST['reset'])) {
                    $email = $_POST['email'];
                    $pass = $_POST['pass'];
                    $sql = "UPDATE `signup` SET `password`='$pass' WHERE `email`='$email'";
                
                    $data = mysqli_query($conn, $sql);

                    if ($data) {
                        echo "Updated Successfully";
                ?>
                        <meta http-equiv="refresh" content="1; url = http://localhost/church_homepage/church_temp1/dorang/public_html/login.php" />
                <?php
                    } else {
                        echo "update failed";
                    }
                }
                ?>
            </form>
        </div>
    </div>
</body>

</html>