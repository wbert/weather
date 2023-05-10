<?php

    require_once("database.php");

    $contact_id = $_POST['contact_id'];
    $contact_name = $_POST['contact_name'];
    $contact_number = $_POST['contact_number'];

    checkExist($contact_id, $contact_name, $contact_number, $connection);

    function checkExist($contact_id, $contact_name, $contact_number,  $connection){
        $checkcustsql = "SELECT * FROM contacts WHERE contact_name='$contact_name' AND contact_number='$contact_number'";
        $query = mysqli_query($connection, $checkcustsql);

        $exist = mysqli_num_rows($query);

        if ($exist>0) {
            echo "error";
            
        }
        else{
            alterData($contact_id, $contact_name, $contact_number, $connection);
            echo "success";
            
        }
    }

    function alterData($contact_id, $contact_name, $contact_number, $connection) {

        
        $sql = "UPDATE contacts SET contact_name='$contact_name',contact_number='$contact_number' WHERE contact_id='$contact_id'";
        mysqli_query($connection, $sql);
               
    }

?>