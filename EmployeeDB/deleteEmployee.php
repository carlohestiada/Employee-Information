<?php
include_once "connectionDB.php"; 
$conn = connectionDatabase();

if (isset($_POST["isDeleteEmployee"])) {

    $isID = $_POST["ID"];
    $sql = "DELETE FROM employeedata WHERE id = '$isID'";
    $conn->query($sql) or die($conn->error);
    
    echo header ("Location: viewEmployee.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>