<?php
session_start();
include("connection.php");
$username = $_SESSION['username'];
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $oldpassword = $_POST['old_password'];
    $newpassword = $_POST['new_password'];
    $confirmpassword = $_POST['confirm_password'];
    $sql = "SELECT password FROM adminlog WHERE username = '$username'";
    $result = mysqli_query($con,$sql);
    $user_data = mysqli_fetch_assoc($result);
    if($result && mysqli_num_rows($result) > 0){
        if($user_data['password'] === $oldpassword){
            if($newpassword === $confirmpassword){
                $sql = "UPDATE adminlog SET password = '$newpassword' WHERE username = '$username'";
                 mysqli_query($con,$sql);
                 if(!$sql){
                     die('error query');
                 }
                 echo "<center><p class='conf'>confirm change password</p></center>";
            }else{
                echo "<center><p class='error'>new password most be like confirm password</p></center>";
            }
        }else{
            echo "<center><p class='error1'>old password incorrect</p></center>";
        }
    }
}
$query = "SELECT `id`, `username`, `first_name`, `last_name` FROM `dbcompany` WHERE username = '$username'";
$result = mysqli_query($con,$query);
$user_data = mysqli_fetch_assoc($result);
$_SESSION['id'] = $user_data['id'];
$username = $_SESSION['username'];
$firstname = $user_data['first_name'];
$lastname = $user_data['last_name'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>change password</title>
        <link rel="stylesheet" href="css/change_password.css">
    </head>
    <body>
        <div class="header">emoloyee leave managment system</div>
        <div class="aside">
            <img src="person.png" style="border-radius: 50%; width: 80px; height: 80px; background-color: white;">
            <div class="info">
                <p><?php echo $_SESSION['username']?></p>
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
        <h3>CHANGE PASSWORD</h3>
        <form method="post">
            <div class="content">
                <div class="inside">
                    <input type="password" name="old_password" placeholder="Enter Old Password">
                    <input type="password" name="new_password" placeholder="Enter New Password">
                    <input type="password" name="confirm_password" placeholder="Enter Confirm Password">
                    <input type="submit" name="change" value="CHANGE" class="button">
                </div>
            </div>
        </form>
    </body>
</html>