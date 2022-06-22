<?php

// $customerMail = "chaudharidigambar52002@gmail.com";
// $name = "jojo";
// $amount = "300";
// $totalAmount = "400";
// $date = date("d/m/Y");
// $AccountNo = "123456789012";

// creditMoneyMail($customerMail,$name,$amount,$totalAmount,$date,$AccountNo);
include_once "../../config.php";
require 'PHPMailerAutoload.php';
require 'class.smtp.php';

function debitMoneyMail($customerMail, $name, $amount, $totalAmount, $date, $AccountNo)
{


    $mail  = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';


    $mail->Username = EMAIL;
    $mail->Password = PASSWORD;

    $content = file_get_contents('../mail/DebitMailTemp.php');
    $mail->setFrom(EMAIL, BANKNAME);
    $mail->addAddress($customerMail);
    $mail->addReplyTo(EMAIL);

    $mail->isHTML(true);
    $mail->Subject = "Your Account '$AccountNo' has been debited";

    $swap_var = array(

        "{Name}" => "$name",
        "{AccountNo}" => "$AccountNo",
        "{Amount}" => "$amount",
        "{Date}" => "$date",
        "{totalAmount}" => "$totalAmount",
        "{BankName}" => BANKNAME,
        "{Address}" => ADDRESS

    );

    foreach (array_keys($swap_var) as $key) {
        if (strlen($key) > 2 && trim($key) != "") {
            $content = str_replace($key, $swap_var[$key], $content);
        }
    }

    $mail->Body = "$content";


    if (!$mail->send()) {
        echo "mail not sent";
    }
}

function creditMoneyMail($customerMail, $name, $amount, $totalAmount, $date, $AccountNo)
{
    $mail  = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';


    $mail->Username = EMAIL;
    $mail->Password = PASSWORD;

    $content = file_get_contents('../mail/CreditMailTemp.php');
    $mail->setFrom(EMAIL, BANKNAME);
    $mail->addAddress($customerMail);
    $mail->addReplyTo(EMAIL);

    $mail->isHTML(true);
    $mail->Subject = "Your Account '$AccountNo' can be credited";

    $swap_var = array(

        "{Name}" => "$name",
        "{AccountNo}" => "$AccountNo",
        "{Amount}" => "$amount",
        "{Date}" => "$date",
        "{totalAmount}" => "$totalAmount",
        "{BankName}" => BANKNAME

    );

    foreach (array_keys($swap_var) as $key) {
        if (strlen($key) > 2 && trim($key) != "") {
            $content = str_replace($key, $swap_var[$key], $content);
        }
    }

    $mail->Body = "$content";


    if (!$mail->send()) {
        echo "mail not sent";
    }
}
