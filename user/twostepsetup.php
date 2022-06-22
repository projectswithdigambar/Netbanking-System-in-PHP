<?php

session_start();
require "Authenticator.php";

if (isset($_SESSION['twostep'])) {

    $authenticator = new Authenticator();

    if (!isset($_SESSION['auth_key'])) {
        $key =  $authenticator->generateRandomSecret();
        $_SESSION['auth_key'] = $key;
    }


    // echo $_SESSION['auth_key'];
    $qrCode = $authenticator->getQR('localhost', $_SESSION['auth_key']);


    // echo "<img src= '{$qrCode}' > ";
} else {
    header('Location: ../user/CreateAccount.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Time-Based Authentication like Google Authenticator</title>
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

                        <img style="text-align: center;;" class="img-fluid" src="<?php echo $qrCode ?>" alt="Verify this Google Authenticator"><br><br>
                        <?php

                        if (isset($_GET['error'])) { ?>
                            <p class="text-danger"> * <?php echo $_GET['error'] ?></p>
                        <?php } ?>

                        <input type="number" class="form-control mt-2" name="code" placeholder="Enter Code" style="font-size: 16px; width: 300px; border-radius: 40px;text-align: center;display: inline;color: #0275d8;"><br> <br>

                        <button type="submit" name="registerVerify" class="btn btn-md btn-primary" style="width: 160px;border-radius: 40px;">Verify</button>

                    </div>
                    <hr>
                    <p style="font-style: italic;" class="text-center">Power by Google Authenticator </p>

                </form>
            </div>
        </div>
    </div>
</body>

</html>