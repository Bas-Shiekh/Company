<?php
session_start();
include("connection.php");
$query = "SELECT * FROM dbcompany WHERE 1";
$result = mysqli_query($con,$query);
$row = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin | Dashboard</title>
        <link rel="stylesheet" href="css/manage_employee.css">
    </head>
    <body>
        <div class="header">emoloyee leave managment system</div>
        <div class="aside">
            <img src="person.png" style="border-radius: 50%; width: 80px; height: 80px; background-color: white;">
            <div class="info">
                <p><?php echo $_SESSION['username'];?></p>
                <p class="pu"></p>
            </div>
            <div class="link">
                <ul class="menu">
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="change_passwordadmin.php">Change Password</a></li>
                    <li><a href="#">Employees</a>
                        <ul class="submenu">
                            <li><a href="add_employee.php" class="none">Add Employee</a></li>
                            <li><a href="manage_employee.php" class="none">Manage Employee</a></li>
                        </ul>
                    </li>
                    <li><a href="leave_manage.php">Leave Managment</a></li>
                    <li><a href="logout.php" class="none">Log Out</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="table">
                <table>
                            <thead>
                            <tr>
                                <th style="color: red;" width="50">Sl No.</th>
                                <th style="color: red;">Username</th>
                                <th style="color: red;">Employee Name</th>
                                <th width="120" style="color: red;">Department</th>
                                <th style="color: red;">Status</th>
                                <th style="color: red;">Reg Date</th>
                                <th style="color: red;" colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $status = "";
                            $read_data = $con->query("SELECT * FROM dbcompany WHERE 1");
                            $i = 1;
                            foreach($read_data as $employee_data){
                            ?>
                                <tr>
                                    <td style="font-weight: bold;"> <?php echo $i;?></td>
                                    <td><?php echo $employee_data['username']?></td>
                                    <td><?php echo $employee_data['first_name'] . " " . $employee_data['last_name'] ?></td>
                                    <td><?php echo $employee_data['section']; ?></td>
                                    <td><?php if($employee_data['status'] == 2){
                                            echo "<span style='color: red;'>Not Active</span>";
                                        }else if($employee_data['status'] == 1){
                                            echo "<span style='color: green;'>Active</span>";
                                        }
                                        ?></td>
                                    <td><?php echo $employee_data['reg_date']; ?></td>
                                    <td><a style="background-color: #10e2f1; color: white; border-radius: 5px;" href="edit_employee.php?id=<?php echo $employee_data['id'];?>">Edit</a></td>
                                    <td><a style="background-color: red; color: white; border-radius: 5px" href="delete_employee.php?id=<?php echo $employee_data['id'];?>">Delete</a></td>
                                    
                                </tr>
                                <?php $i++; }?>
                                
                            </tbody>
                </table>
            </div>
        </div>
    </body>
</html>