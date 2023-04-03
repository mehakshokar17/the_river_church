<!DOCTYPE html>
<?php
include_once 'database.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <script src="https://www.gstatic.com/firebasejs/9.0.2/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.0.2/firebase-auth-compat.js"></script>


    <title>Document</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form method="POST" action="#">
                <h1>Create Account</h1>

                <input type="text" name="name" placeholder="Name" />
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="pass" placeholder="Password" />
                <button type="submit" name="submit">Sign Up</button>
                <?php


                $sql = "SELECT * FROM signup;";
                $result = mysqli_query($conn, $sql);


                if (isset($_POST['submit'])) {

                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $pass = $_POST['pass'];
                    $sql = "INSERT INTO `signup`(`name`, `email`, `password`) VALUES ('$name','$email','$pass');";
                    // $sql = "INSERT INTO `table1`(`username`, `password`) VALUES ('$user','$pass'); ";
                    $data = mysqli_query($conn, $sql);

                    if ($data) {
                        //echo "Inserted Successfully";
                    } else {
                        echo "Insertion failed";
                    }
                }
                ?>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form method="POST" action="#">
                <h1>Log In</h1>
                <div class="social-container">
                    <button id="google-sign-in-1">Sign in with Google</button>
                </div>
                <span>or use your account</span>
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="pass" placeholder="Password" />
                <a href="forgotpass.php">Forgot your password?</a>
                <button type="submit" name="login">Log In</button>
                <?php

                if (isset($_POST['login'])) {
                    $email = $_POST['email'];
                    $pass = $_POST['pass'];
                    $sql = "SELECT * FROM signup where email ='$email' && password='$pass' ";
                    $data = mysqli_query($conn, $sql);
                    $total = mysqli_num_rows($data);

                    if ($total == 1) {
                        // echo "login Successful";

                ?>
                        <div class="btn"><?php echo "login Successful"; ?></div>
                        <meta http-equiv="refresh" content="1; url = http://localhost/church_homepage/church_temp1/dorang/public_html/index.php" />
                    <?php
                        
                    } else {
                    ?>
                        <div class="btn"><?php echo "login failed"; ?></div>
                <?php
                    }
                }
                ?>
            </form>

        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Already in our family?</h1>
                    <p> </p>
                    <button class="ghost" id="signIn">Log In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Praise The Lord!</h1>
                    <p>"He will command his angels concerning you to guard you carefully!"</p>
                    <p>Luke 4:10</p>
                    <p>Not a member?SIGN UP!!</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });

        const firebaseConfig = {
            apiKey: "AIzaSyBCqCAAZcD21zaOPXkG_Oy2Yi-KZtPd38M",
            authDomain: "the-river-church-01.firebaseapp.com",
            projectId: "the-river-church-01",
            storageBucket: "the-river-church-01.appspot.com",
            messagingSenderId: "16104793523",
            appId: "1:16104793523:web:5b81546c61c4b6276997c6",
            measurementId: "G-G8GQYLSYXN"
        };

        firebase.initializeApp(firebaseConfig);
        const auth = firebase.auth();

        //for handling the google sign in
        const googleSignInButton1 = document.getElementById('google-sign-in-1');

        googleSignInButton1.addEventListener('click', async () => {
            const provider = new firebase.auth.GoogleAuthProvider();
            try {
                // Sign in with Google
                const result = await auth.signInWithPopup(provider);
                const token = result.credential.accessToken;
                const user = result.user;

            } catch (error) {
                console.error('Error signing in with Google:', error);
            }
        });
    </script>
</body>

</html>