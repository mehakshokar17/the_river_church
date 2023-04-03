<!DOCTYPE html>
<html lang="en">
<?php
include_once 'database.php';
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="payment.css">

</head>

<body>

    <div class="container">

        <form method="POST" action="">
            <div class="row">

                <div class="col">

                    <h3 class="title">billing address</h3>

                    <div class="inputBox">
                        <span>full name :</span>
                        <input type="text" name="name" placeholder="john deo">
                    </div>
                    <div class="inputBox">
                        <span>email :</span>
                        <input type="email" name="email" placeholder="example@example.com">
                    </div>
                    <div class="inputBox">
                        <span>address :</span>
                        <input type="text" name="address" placeholder="room - street - locality">
                    </div>
                    <div class="inputBox">
                        <span>city :</span>
                        <input type="text" name="city" placeholder="mumbai">
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>state :</span>
                            <input type="text" name="state" placeholder="india">
                        </div>
                        <div class="inputBox">
                            <span>zip code :</span>
                            <input type="text" name="zipcode" placeholder="123 456">
                        </div>
                    </div>

                </div>


                <div class="col">

                    <h3 class="title">UPI - QR Scanner</h3>

                    <div class="inputBox2">

                        <img src="./assets/imgs/default_qrcode.png" alt="">
                    </div>
                    <div class="inputBox">
                        <span>donation amount :</span>
                        <input type="text" name="amount" placeholder="0">
                    </div>


                </div>

            </div>
            <button type="submit" name="submit" value="Donate" class="submit-btn">Donate</button>
           
            <?php


            $sql = "SELECT * FROM donation;";
            $result = mysqli_query($conn, $sql);


            if (isset($_POST['submit'])) {

                $name = $_POST['name'];
                $email = $_POST['email'];
                $address=$_POST['address'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $zipcode = $_POST['zipcode'];
                $amount = $_POST['amount'];
                $sql = "INSERT INTO `donation`(`name`, `email`, `address`, `city`, `state`, `zipcode`, `amount`) VALUES ('$name','$email','$address','$city','$state','$zipcode','$amount'); ";
                $data = mysqli_query($conn, $sql);

                if ($data) {
                    ?>
                    
                    <meta http-equiv="refresh" content="1; url = http://localhost/church_homepage/church_temp1/dorang/public_html/paysucc.html" />
                <?php
                } else {
                    echo "Insertion failed";
                }
            }
            ?>
        </form>



    </div>

</body>

</html>