<?php
session_start();
include("connection.php");
$username = $_SESSION['username'];
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $oldpassword = $_POST['old_password'];
    $newpassword = $_POST['new_password'];
    $confirmpassword = $_POST['confirm_password'];
    $sql = "SELECT password FROM dbcompany WHERE username = '$username'";
    $result = mysqli_query($con,$sql);
    $user_data = mysqli_fetch_assoc($result);
    if($result && mysqli_num_rows($result) > 0){
        if($user_data['password'] === $oldpassword){
            if($newpassword === $confirmpassword){
                $sql = "UPDATE dbcompany SET password = '$newpassword' WHERE username = '$username'";
                 mysqli_query($con,$sql);
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
        <p style="text-transform: capitalize;"><?php echo $firstname . " " . $lastname; ?></p>
        <p class="pu"><?php echo $username; ?></p>
      </div>
      <div class="link">
        <ul class="menu">
          <li><a href="update_information.php">My Profiles</a></li>
          <li><a href="change_password.php">Change Password</a></li>
          <li><a href="#">Leaves</a>
              <ul class="submenu">
                <li><a href="apply_leave.php" class="none">Apply leave</a></li>
                <li><a href="leave_history.php" class="none">Leave History</a></li>
              </ul>
          </li>
          <li><a href="logout.php" class="none">Log Out</a></li>
        </ul>
      </div>
    </div>
    <form method="post">
      <h3>CHANGE PASSWORD</h3>
      <div class="content">
        <div class="incont">
          <span>Enter Old Password</span>
      		<input type="password" name="old_password" placeholder="Enter Old Password">
          <span>Enter New Password</span>
          <input type="password" name="new_password" placeholder="Enter New Password">
          <span>Enter Confirm New Password</span>
          <input type="password" name="confirm_password" placeholder="Enter Confirm Password">
          <input type="submit" name="change" value="CHANGE" class="btn">
        </div>
      </div>
    </form>
    <footer>
			<h6>CopyRights Saved By Bacel &copy; 2021</h6>
    </footer>
  </body>
</html>