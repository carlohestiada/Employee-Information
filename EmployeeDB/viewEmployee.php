<?php include_once "connectionDB.php"; 
$conn = connectionDatabase();

//View Employee
$sql = "SELECT * FROM employeedata"; 
$employeeQuery = $conn->query($sql) or die($conn->error);
$employeeData = $employeeQuery->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Employee</title>
</head>
<body>
    <h1>View Employee</h1>
    <a href="addemployee.php">Add Employee</a>&nbsp;&nbsp;<a href="index.php">←Back</a><br><br>
    <table>
        <thead>
            <tr>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Employee Number</td>
                <td>Contact Number</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php do{ ?>
            <tr>
                <td><?php echo $employeeData['firstName'] ?></td>
                <td><?php echo $employeeData['lastName'] ?></td>
                <td><?php echo $employeeData['employeeNumber'] ?></td>
                <td>+63&nbsp;<?php echo $employeeData['contactNumber'] ?></td>
                <td><a href="index.php?ID=<?php echo $employeeData['id']?>">View</a></td>
            </tr>
            <?php }while($employeeData = $employeeQuery->fetch_assoc());?>
        </tbody>
    </table>
    
</body>
</html>