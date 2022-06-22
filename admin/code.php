<?php
include "../admin/connection.php";
include "../mail/TransactionMail.php";

if (isset($_POST['CAccountNo'])) {
    $AccountNo = $_POST['CAccountNo'];

    // $query = "SELECT * FROM customer_detail INNER JOIN login ON customer_detail.Account_No=login.AccountNo WHERE login.Status = 'Inactive' AND login.AccountNo ='$AccountNo'";

    $query = "SELECT * FROM customer_detail WHERE Account_No = '$AccountNo'";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $Fname = $row['C_First_Name'];
            $Lname = $row['C_Last_Name'];
            $Faname = $row['C_Father_Name'];
            $Maname = $row['C_Mother_Name'];
            $Bdate = $row['C_Birth_Date'];
            $AdharNo = $row['C_Adhar_No'];
            $PanNo = $row['C_Pan_No'];
            $MobileNo = $row['C_Mobile_No'];
            $Email = $row['C_Email'];
            $Pincode = $row['C_Pincode'];
            $AdharDoc = $row['C_Adhar_Doc'];
            $PanDoc = $row['C_Pan_Doc'];
        }

        $data = array(
            'Fname' => $Fname,
            'Lname' => $Lname,
            'Faname' => $Faname,
            'Maname' => $Maname,
            'Bdate' => $Bdate,
            'AdharNo' => $AdharNo,
            'PanNo' => $PanNo,
            'MobileNo' => $MobileNo,
            'Email' => $Email,
            'Pincode' => $Pincode,
            'AdharDoc' => $AdharDoc,
            'PanDoc' => $PanDoc
        );

        echo json_encode($data);
    }
}

// Verify / Verify Account Code

if (isset($_POST['VerifyAc'])) {
    $AccountNo = $_POST['VerifyAc'];

    $query = "UPDATE login SET Status = 'Active' WHERE AccountNo = '$AccountNo'";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    echo "Success";
}

// Verify/ Reject Account Code
if (isset($_POST['RejectAc'])) {
    $AccountNo = $_POST['RejectAc'];

    $query = "DELETE FROM customer_detail WHERE Account_No = '$AccountNo';";
    $query .= "DELETE FROM login WHERE AccountNo = '$AccountNo';";
    $query .= "DELETE FROM accounts WHERE AccountNo = '$AccountNo'";
    // multi query to execute multiple query at a time
    mysqli_multi_query($conn, $query) or die(mysqli_error($conn));

    echo "Success";
}

// verify/ reset id code

if (isset($_POST['done'])) {

    $resetQuery = "SET @autoid := 0;
        UPDATE accounts SET ID = @autoid := (@autoid+1);
        ALTER TABLE accounts AUTO_INCREMENT = 1;
        SET @autoid := 0;
        UPDATE customer_detail SET C_No = @autoid := (@autoid+1);
        ALTER TABLE customer_detail AUTO_INCREMENT = 1;
        SET @autoid := 0;
        UPDATE login SET ID = @autoid := (@autoid+1);
        ALTER TABLE login AUTO_INCREMENT = 1";
    mysqli_multi_query($conn, $resetQuery) or die(mysqli_error($conn));
}



// Debit Cards

// Check Debit card Code

// TransferMoney / SenderAccount

if (isset($_POST['SenderAcNo'])) {
    $AccountNo = $_POST['SenderAcNo'];

    $query = "SELECT * FROM customer_detail JOIN login ON customer_detail.Account_No = login.AccountNo JOIN accounts ON accounts.AccountNo = login.AccountNo WHERE customer_detail.Account_No = '$AccountNo'";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $Fname = $row['C_First_Name'];
            $Lname = $row['C_Last_Name'];
            $AdharNo = $row['C_Adhar_No'];
            $PanNo = $row['C_Pan_No'];
            $MobileNo = $row['C_Mobile_No'];
            $Balance = $row['Balance'];
            $Status = $row['Status'];
        }

        $flag = "success";

        $data = array(

            'Flag' => $flag,
            'Fname' => $Fname,
            'Lname' => $Lname,
            'AdharNo' => $AdharNo,
            'PanNo' => $PanNo,
            'MobileNo' => $MobileNo,
            'Balance' => $Balance,
            'Status' => $Status
        );

        echo json_encode($data);
    } else {
        $flag = "fail";
        $data = array(
            'Flag' => $flag

        );

        echo json_encode($data);
    }
}

// TransferMoney / ReceiverAccount

if (isset($_POST['ReceiverAcNo'])) {
    $AccountNo = $_POST['ReceiverAcNo'];

    $query = "SELECT * FROM customer_detail JOIN login ON customer_detail.Account_No = login.AccountNo JOIN accounts ON accounts.AccountNo = login.AccountNo WHERE customer_detail.Account_No = '$AccountNo'";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $Fname = $row['C_First_Name'];
            $Lname = $row['C_Last_Name'];
            $AdharNo = $row['C_Adhar_No'];
            $PanNo = $row['C_Pan_No'];
            $MobileNo = $row['C_Mobile_No'];
            $Balance = $row['Balance'];
            $Status = $row['Status'];
        }
        $flag = "success";
        $data = array(
            'Flag' => $flag,
            'Fname' => $Fname,
            'Lname' => $Lname,
            'AdharNo' => $AdharNo,
            'PanNo' => $PanNo,
            'MobileNo' => $MobileNo,
            'Balance' => $Balance,
            'Status' => $Status
        );

        echo json_encode($data);
    } else {
        $flag = "fail";
        $data = array(
            'Flag' => $flag

        );

        echo json_encode($data);
    }
}

// TransferMoney / Checking Balance

if (isset($_POST['BalanceCheck'])) {
    $AccountNo = $_POST['BalanceCheck'];

    $query = "SELECT * FROM accounts WHERE AccountNo = '$AccountNo'";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $Balance = $row['Balance'];
        }
        echo $Balance;
    }
}




// TransferMoney / Transaction Code
