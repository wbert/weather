<?php
    require_once("database.php");
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM accounts WHERE acc_username = '$username' AND acc_password = '$password'";
    $query = mysqli_query($connection, $sql);
    $exist = mysqli_num_rows($query);

    if($exist>0) {

        $row = mysqli_fetch_assoc($query);
        $_SESSION['acc_id'] = $row['acc_id'];
        $_SESSION['acc_username']=$row['acc_username'];
        echo "success";
    }
    else {
        echo "error";
    }

?>