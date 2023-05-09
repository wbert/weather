<?php
    require_once("database.php");


    $name = $_POST['name'];
    $contact_number = $_POST['contact_number'];
    $date_added = date("Y/m/d");

    checkExist($name, $contact_number, $connection);

    function checkExist($name, $contact_number,  $connection){
        $checksql = "SELECT * FROM contacts WHERE contact_name='$name' AND contact_number='$contact_number'";
        $query = mysqli_query($connection, $checksql);

        $exist = mysqli_num_rows($query);

        if ($exist>0) {
            echo "error";
        }
        else{
            insertData($name, $contact_number, $connection);
            echo "success";
        }
    }

    function insertData($name, $contact_number, $connection) {

        
        $sql = "INSERT INTO contacts(contact_name, contact_number) 
        VALUES ('$name', '$contact_number')";
        mysqli_query($connection, $sql);
               
    }

?>