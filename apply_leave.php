<?php
session_start();
include("connection.php");
$username = $_SESSION['username'];
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $fromdate = $_POST['from_date'];
    $todate = $_POST['to_date'];
    $leave_type = $_POST['leave-type'];
    $description = $_POST['description'];
    $posting_date = date('Y-m-d');
    $id = $_SESSION['id'];
    if($fromdate < $todate){
        $query = "INSERT INTO `leavedb`(`id`, `type-leave`, `fromdate`, `todate`, `description`, `posting-date`) VALUES ('$id','$leave_type','$fromdate','$todate','$description','$posting_date')";
        $result = mysqli_query($con,$query);
        if(!$result){
            die("error query");
        }
    }else{
        echo "<p class='error'>To-Date Most Be Bigger Than From-Date</p>";
    }
}
$query = "SELECT `id`, `username`, `first_name`, `last_name` FROM `dbcompany` WHERE username = '$username'";
$result = mysqli_query($con,$query);
$user_data = mysqli_fetch_assoc($result);
$_SESSION['id'] = $user_data['id'];
$firstname = $user_data['first_name'];
$lastname = $user_data['last_name'];

?>

<!DOCTYPE html>
<html>
	<head>
    <meta charset="UTF-8">
    <title>apply leave</title>
    <link rel="stylesheet" href="css/apply_leave.css">
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
      <h3>APPLY FOR LEAVE</h3>
      <div class="content">
        <div class="incont">
          <div class="inside">
            <span>FROM DATE</span>
            <span>TO DATE</span>
          </div>
          <div class="inside">
            <input type="date" name="from_date" placeholder="From Date">
            <input type="date" name="to_date" placeholder="To Date">
          </div>
          <select name="leave-type">
            <option value="restricted holiday">Restricted Holiday</option>
            <option value="medical leave">Medical Leave</option>
            <option value="casual leave">Casual Leave</option>
          </select>
          <input type="text" name="description"  placeholder="Description(optional)" class="desc">
          <input type="submit" name="apply" value="APPLY" class="btn">
        </div>
      </div>
  	</form>
    <footer>
			<h6>CopyRights Saved By Bacel &copy; 2021</h6>
		</footer>
  </body>
</html>