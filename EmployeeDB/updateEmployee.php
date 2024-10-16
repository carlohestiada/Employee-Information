<?php 
include_once "connectionDB.php";

$conn = connectionDatabase();

$getIdEmployee = $_GET['ID'];

//View Employee
$sql = "SELECT * FROM employeedata WHERE id = '$getIdEmployee'"; 
$employeeQuery = $conn->query($sql) or die($conn->error);
$employeeData = $employeeQuery->fetch_assoc();

if (isset($_POST["updateEmployeeBTN"])) {
    $employeeFirstName = $_POST["updateEmployeeFirstName"];
    $employeeLastName = $_POST["updateEmployeeLastName"];
    $employeeNumber = $_POST["updateEmployeeNumber"];
    $employeeContactNumber = $_POST["updateEmployeeContactNumber"];

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
        // if no error update the specific data
        $sql = "UPDATE employeedata SET firstName = '$employeeFirstName', lastName = '$employeeLastName', employeeNumber = '$employeeNumber', contactNumber = '$employeeContactNumber' WHERE id = '$getIdEmployee'"; 
        $conn->query($sql) or die($conn->error);

        if (mysqli_query($conn, $sql)) {
            // echo header("Location: viewEmployee.php?ID=.$getIdEmployee");
            succesUpdateNotif();
        }
        

    }

    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee</title>
</head>
<body>
<h1>Fill up form.</h1>

<a href="viewEmployee.php">View Employee</a>
<table>
    <thead>
        <tr>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Employee Number</td>
            <td>Contact Number</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $employeeData ['firstName']?></td>
            <td><?php echo $employeeData ['lastName']?></td>
            <td><?php echo $employeeData ['employeeNumber']?></td>
            <td><?php echo $employeeData ['contactNumber']?></td>
        </tr>
    </tbody>
</table>
<br><br>
<h3>Update</h3>
    <form action="" method="POST">
        <input type="text" name="updateEmployeeFirstName" placeholder="First Name"><br>
        <input type="text" name="updateEmployeeLastName" placeholder="Last Name"><br>
        <input type="text" name="updateEmployeeNumber" placeholder="Employee Number"><br>
        <input type="text" name="updateEmployeeContactNumber" placeholder="Contact Number"><br>
        <input type="submit" value="Update Employee" name="updateEmployeeBTN">
    </form><br><br>
</body>
</html>