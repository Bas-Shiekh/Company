<?php 
session_start();
include("connection.php");
$lid = $_GET['leavenum'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>change password</title>
        <link rel="stylesheet" href="css/leave_details.css">
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
        <h2>LEAVE DETAILS</h2>
            <div class="content">
                <table>
                <?php
                            $status = "";
                            $read_data = $con->query("SELECT * FROM leavedb WHERE num = '$lid'");
                            foreach($read_data as $leave_data){
                                $num = $leave_data['num'];
                                if($lid = $num){
                                $status = $leave_data['status'];
                                $id = $leave_data['id'];
                                $sql = "SELECT * FROM dbcompany WHERE id = '$id'";
                                $result = mysqli_query($con,$sql);
                                $user_data = mysqli_fetch_assoc($result);
                            ?>
                    <tr>
                        <td>Employee Name :</td>
                        <td style="color: blue;"><?php echo $user_data['first_name'] . " " . $user_data['last_name'];?></td>
                        <td>Emp Username :</td>
                        <td><?php echo $user_data['username'];?></td>
                        <td>Gender :</td>
                        <td><?php echo $user_data['sex'];?></td>
                    </tr>
                    <tr>
                        <td>Emp Email :</td>
                        <td><?php echo $user_data['email'];?></td>
                        <td>Emp Content No. :</td>
                        <td><?php ?></td>
                    </tr>
                    <tr>
                        <td>Leave Type :</td>
                        <td><?php echo $leave_data['type-leave'];?></td>
                        <td>Leave Date :</td>
                        <td><?php echo "From " . $leave_data['fromdate'] . " TO " . $leave_data['todate'];?></td>
                        <td>Posting Date :</td>
                        <td><?php echo $leave_data['posting-date'];?></td>
                    </tr>
                    <tr>
                        <td>Employee Leave Description :</td>
                        <td><?php echo $leave_data['description'];?></td>
                    </tr>
                    <tr>
                        <td>Leave Status :</td>
                        <td><?php 
                            if($leave_data['status'] == 2){
                                        echo "<span style='color: red;'>Not Approved</span>";
                                    }else if($leave_data['status'] == 1){
                                        echo "<span style='color: green;'>Approved</span>";
                                    }else{
                                        echo "<span style='color: blue;'>Waiting For Approval</span>";
                                    }?></td>
                    </tr>
                    <tr>
                    <?php }}?>
                       <?php
                       $status = $leave_data['status'];
                        if($status == 0){
                            ?>
                       <td style="border-bottom: 0; text-align: center;"><a href="test.php?leavenum=<?php echo $leave_data['num']?>" class="view">Take Action</a></td>
                    <?php }?>
                    </tr>
                </table>
            </div>
    </body>
</html>