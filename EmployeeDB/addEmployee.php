<?php

if (isset($_POST["addEmployeeBTN"])) {
    $employeeFirstName = $_POST["employeeFirstName"];
    $employeeLastName = $_POST["employeeLastName"];
    $employeeNumber = $_POST["employeeNumber"];
    $employeeContactNumber = $_POST["employeeContactNumber"];
    

    $employeeErrorField = array();

    if (empty($employeeFirstName) OR empty($employeeLastName) OR empty($employeeNumber) OR empty($employeeContactNumber)) {
        array_push($employeeErrorField, "All Fields are required");
    }

    if (count($employeeErrorField)>0) {
        foreach ($employeeErrorField as $employeeErrorFields) {
            echo "<div class='errorAllert'>$employeeErrorFields</div>";
        }
    }

    else {
        require_once "connectionDB.php";
        $conn = connectionDatabase();
        $sql = "INSERT INTO employeedata (firstName, lastName, employeeNumber, contactNumber) VALUES ('$employeeFirstName', '$employeeLastName', '$employeeNumber', '$employeeContactNumber')";

        if (mysqli_query($conn, $sql)) {
            succesNotif();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
</head>
<body>
    <h1>Fill up form.</h1>

    <a href="viewEmployee.php">View Employee</a><br><br>
    <h2>Add Employee</h2>
    <form action="addEmployee.php" method="POST">
        <input type="text" name="employeeFirstName" placeholder="First Name"><br>
        <input type="text" name="employeeLastName" placeholder="Last Name"><br>
        <input type="text" name="employeeNumber" placeholder="Employee Number"><br>
        <input type="text" name="employeeContactNumber" placeholder="Contact Number"><br>
        <input type="submit" value="Add Employee" name="addEmployeeBTN">
    </form><br><br>
</body>
</html>