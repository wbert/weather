<?php
    require_once("database.php");
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM accounts WHERE acc_username = '$username' AND acc_password = PASSWORD('$password')";
    $query = mysqli_query($connection, $sql);
    $exist = mysqli_num_rows($query);

    if($exist>0) {

        $row = mysqli_fetch_assoc($query);
        $_SESSION['emp_id'] = $row['emp_id'];
        $_SESSION['emp_name']=$row['emp_fname']." ".$row['emp_lname'];
        echo "success";
    }
    else {
        echo "error";
    }

?>