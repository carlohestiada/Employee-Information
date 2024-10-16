<?php

function connectionDatabase() {
    $databaseHostName = "localhost";
    $databaseUsername = "root";
    $databasePassword = "";
    $databaseName = "employeeDB";

    $conn = mysqli_connect($databaseHostName, $databaseUsername, $databasePassword, $databaseName);
    if (!$conn) {
        die ("Connection failed:");
    } else {
        return $conn;
    }
}

function succesNotif() {
    echo "<div class='succesfullAllert'>New record created succesfully</div>";
}

function succesUpdateNotif() {
    echo "<div class='succesfullAllert'>Update succesfully</div>";
}

?>
