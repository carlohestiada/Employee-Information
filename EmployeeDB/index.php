<?php 
include_once "connectionDB.php"; 

$conn = connectionDatabase();

if (empty($getIdEmployee = $_GET['ID'])) {
    echo header("Location: viewEmployee.php");
}


//View Employee
$sql = "SELECT * FROM employeedata WHERE id = '$getIdEmployee'"; 
$employeeQuery = $conn->query($sql) or die($conn->error);
$employeeData = $employeeQuery->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1>Employee Management</h1>
    <a href="addEmployee.php">Add new Employee</a>&nbsp;
    <a href="viewEmployee.php">View Employee</a>

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
            <!-- show specific data when click the view button -->
                <tr>
                    <td><?php echo $employeeData ['firstName']?></td>
                    <td><?php echo $employeeData ['lastName']?></td>
                    <td><?php echo $employeeData ['employeeNumber']?></td>
                    <td><?php echo $employeeData ['contactNumber']?></td>
                    <td><a href="updateEmployee.php?ID=<?php echo $employeeData['id']?>">Update</a></td>
                </tr>
        </tbody>
        <!-- delete this employee -->
    </table><form action="deleteEmployee.php" method="post">
        <button type="submit" name="isDeleteEmployee">Delete</button>
        <input type="hidden" name="ID" value="<?php echo $employeeData['id']?>">
    </form>
    
</body>
</html>