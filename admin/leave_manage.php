<?php 
session_start();
include("connection.php");
$num = 1;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>leave history</title>
        <link rel="stylesheet" href="css/leave_manage.css">
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
                    <li><a href="#">Leave Managment</a></li>
                    <li><a href="logout.php" class="none">Log Out</a></li>
                </ul>
            </div>
        </div>
        <h3>LEAVE History</h3>
        <form method="post">
            <div class="content">
                <div class="inside">
                    <table>
                        <thead>
                        <tr>
                            <th style="color: red;">#</th>
                            <th style="color: red;">Employee Name</th>
                            <th style="color: red;">Leave Type</th>
                             <th width="120" style="color: red;">Posting Date</th>
                            <th style="color: red;">Status</th>
                            <th style="color: red;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $read_data = $con->query("SELECT * FROM leavedb WHERE 1");
                        $i = 1;
                        foreach($read_data as $user_data){
                            $status = $user_data['status'];
                            $id = $user_data['id'];
                            $sql = "SELECT `username`, `first_name`, `last_name`, 'type-leave' FROM `dbcompany` WHERE id = '$id'";
                            $result = mysqli_query($con,$sql);
                            $employee_data = mysqli_fetch_assoc($result);
                            $firstname = $employee_data['first_name'];
                            $lastname = $employee_data['last_name'];
                            $type_leave = $employee_data['type-leave'];
                        ?>
                            <tr>
                                <td > <?php echo $i;?></td>
                                <td style="color: blue; font-weight: bold;"><?php echo $employee_data['first_name'] . " " . $employee_data['last_name'] . "<br>(" . $employee_data['username'] . ")";?></td>
                                <td><?php echo $user_data['type-leave'];?></td>
                                <td><?php echo $user_data['posting-date']; ?></td>
                                <td><?php if($status == 2){
                                    echo "<span style='color: red;'>Not Approved</span>";
                                }else if($status == 1){
                                    echo "<span style='color: green;'>Approved</span>";
                                }else{
                                    echo "<span style='color: blue;'>Waiting For Approval</span>";
                                }
                                ?>
                                </td>
                                <td><a href="leave_details.php?leavenum=<?php echo $user_data['num']?>" class="view">View Details</a></td>
                            <?php $i++; }?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </body>
</html>