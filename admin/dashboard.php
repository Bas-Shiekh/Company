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
        <link rel="stylesheet" href="css/dashboard.css">
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
            <div class="card">

                    <div>
                        <p class="pc">TOTALE REGD EMPLOYEE</p>
                        <P><?php echo $row;?></P>
                    </div>


                    <div><?php
                        $query = "SELECT * FROM section WHERE 1";
                        $result = mysqli_query($con,$query);
                        $row = mysqli_num_rows($result);
                    ?>
                        <p class="pc">TOTALE DEPARTMENTS</p>
                        <P><?php echo $row;?></P>
                    </div>


                    <div><?php
                        $query = "SELECT * FROM leavedb WHERE 1";
                        $result = mysqli_query($con,$query);
                        $row = mysqli_num_rows($result);
                    ?>
                        <p class="pc">TOTALE LEAVE APPLICATIONS</p>
                        <P><?php echo $row;?></P>
                    </div>

            </div>
            <div class="table">
                <p class="spaer">LATEST LEAVE APPLICATIONS</p>
                <table>
                            <thead>
                            <tr>
                                <th style="color: red;" width="50">Sl No.</th>
                                <th style="color: red;">Employee Name</th>
                                <th width="120" style="color: red;">Leave Type</th>
                                <th width="120" style="color: red;">Posting Date</th>
                                <th style="color: red;">Status</th>
                                <th style="color: red;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $status = "";
                            $read_data = $con->query("SELECT * FROM leavedb WHERE 1");
                            $i = 1;
                            foreach($read_data as $user_data){
                                $status = $user_data['status'];
                                $id = $user_data['id'];
                                $sql = "SELECT * FROM dbcompany WHERE id = '$id'";
                                $result = mysqli_query($con,$sql);
                                $employee_data = mysqli_fetch_assoc($result);
                            ?>
                                <tr>
                                    <td style="font-weight: bold;"> <?php echo $i;?></td>
                                    <td><?php echo $employee_data['first_name'] . " " . $employee_data['last_name'] . " " . "<br>" . $employee_data['username']?></td>
                                    <td><?php echo $user_data['type-leave']; ?></td>
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
                                </tr>
                                <?php $i++; }?>
                                
                            </tbody>
                </table>
            </div>
        </div>
    </body>
</html>