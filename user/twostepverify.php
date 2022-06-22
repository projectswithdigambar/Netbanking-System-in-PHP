<?php


// Remove Image of qr code

// check logic in check.php 


session_start();
require "Authenticator.php";
include 'connection.php';


if (isset($_SESSION['verifyCode'])) {
    $authenticator = new Authenticator();
    $username = $_SESSION['verifyCode'];

    $query = "SELECT * FROM login WHERE Username = '$username' ";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

            $key = $row['AuthKey'];
            $AcNo = $row['AccountNo'];
        }
        $_SESSION['twostep'] = $AcNo;
        $_SESSION['userKey'] = $key;
    }
} else {
    header('Location: ../user/CreateAccount.php');
}

if (isset($_POST['forgotBtn'])) {


    header('Location: ../user/twostepsetup.php');
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Two Step Verification</title>
    <link href="../assets/img/favicon-32x32.png" rel="icon">
    <link href="../assets/img/apple-icon-180x180.png" rel="apple-touch-icon">
    <meta name="description" content="Implement Google like Time-Based Authentication into your existing PHP application. And learn How to Build it? How it Works? and Why is it Necessary these days." />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <link rel='shortcut icon' href='/favicon.ico' />
    <style>
        body,
        html {
            height: 100%;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .bg {
            /* The image used */
            background-image: url("../assets/img/secure.webp");
            /* Full height */
            height: 100%;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;

            background-size: cover;


        }

        .forgotLink {
            color: grey;
            font-style: italic;
            border: none;
            background-color: transparent;
            cursor: pointer;
        }

        .forgotLink:hover {
            color: #0275d8;
            text-decoration: underline;
        }
    </style>
</head>

<body class="bg">
    <div class="container">
        <div class="row text">
            <div class="col-md-6 offset-md-6" style="background: white; padding: 20px; margin-top: 40px;">
                <h1 class="text-center">Two Step Verification</h1>
                <p style="font-style: italic; color:gray" class="text-center">Download google authenticator in mobile and scan QR code</p>
                <hr>
                <form action="check.php" method="post">
                    <div style="text-align: center;">
                        <img src="../assets/img/secureAC.gif" alt="" style="height: 200px;">
                        <?php
                        if (isset($_GET['error'])) { ?>
                            <p class="text-danger"> * <?php echo $_GET['error'] ?></p>
                        <?php } ?>
                        <input type="number" class="form-control mt-2" name="Scode" placeholder="Enter Code" style="font-size: 16px; width: 300px; border-radius: 40px;text-align: center;display: inline;color: #0275d8;"><br> <br>

                        <button type="submit" name="verifyBtn" class="btn btn-md btn-primary" style="width: 160px;border-radius: 40px;">Verify</button>
                </form>
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <p style=" color: grey; font-style: italic;" class="mt-2 ">Lose Account ? <input class="forgotLink" type="submit" name="forgotBtn" value=" Reset google authenticator"></input> </p>
                </form>
            </div>
            <hr>
            <p style="font-style: italic;" class="text-center">Power by Google Authenticator </p>

        </div>
    </div>
    </div>
</body>

</html>