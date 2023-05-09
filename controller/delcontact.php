<?php

    require_once("database.php");

    $contact_id = $_POST['contact_id'];

    delcontact($contact_id, $connection);
    echo 'success';

    function delcontact($contact_id, $connection) {
        
        $sql = "DELETE FROM contacts WHERE contact_id = $contact_id";
        mysqli_query($connection, $sql);
               
    }

?>