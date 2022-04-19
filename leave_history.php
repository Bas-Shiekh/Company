<?php 
session_start();
include("connection.php");
$username = $_SESSION['username'];
$id = $_SESSION['id'];
$i = 1;
$query = "SELECT `id`, `username`, `first_name`, `last_name` FROM `dbcompany` WHERE username = '$username'";
$result = mysqli_query($con,$query);
$user_data = mysqli_fetch_assoc($result);
$_SESSION['id'] = $user_data['id'];
$firstname = $user_data['first_name'];
$lastname = $user_data['last_name'];
$num = 1;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>leave history</title>
    <link rel="stylesheet" href="css/leave_history.css">
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
      <h3>LEAVE HISTORY</h3>
      <div class="content">
        <div class="incont">
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th width="120">Leave Type</th>
                <th>From</th>
                <th>To</th>
                <th>Description</th>
                <th width="120">Posting Date</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
                        <?php
                        $id = $_SESSION['id'];
                        $read_data = $con->query("SELECT * FROM leavedb WHERE id = $id");
                        
                        foreach($read_data as $user_data){
                            $status = $user_data['status'];
                        ?>
                            <tr>
                                <td > <?php echo $i;?></td>
                                <td><?php echo $user_data['type-leave']; ?></td>
                                <td><?php echo $user_data['fromdate'];?></td>
                                <td><?php echo $user_data['todate']; ?></td>
                                <td><?php echo $user_data['admin-description']; ?></td>
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
                            <?php $i++; }?> 
                        </tbody>
          </table>
        </div>
      </div>
    </form>
    <footer>
			<h6>CopyRights Saved By Bacel &copy; 2021</h6>
    </footer>
  </body>
</html>