<?php
session_start();
include("connection.php");
if (!isset($_SESSION['username'])) {
	header("location: login.php");
} else {
	$username = $_SESSION['username'];
	$query = "SELECT `id`, `username`, `first_name`, `last_name`, `email`, `section`, `sex`, `b_date`, `Country`, `city`, `mobile_number` FROM `dbcompany` WHERE username = '$username'";
	$result = mysqli_query($con, $query);
	$user_data = mysqli_fetch_assoc($result);
	$_SESSION['id'] = $user_data['id'];
	$username = $_SESSION['username'];
	$firstname = $user_data['first_name'];
	$lastname = $user_data['last_name'];
	$email = $user_data['email'];
	$section = $user_data['section'];
	$mobilenumber = $user_data['mobile_number'];
	$sex = $user_data['sex'];
	$city = $user_data['city'];
	$country = $user_data['Country'];
	$date = $user_data['b_date'];
	$id = $_SESSION['id'];
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {

	if (isset($_POST['update'])) {
		if ($user_data['id']) {
			$username = $_POST['username'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$section = $_POST['section'];
			$mobilenumber = $_POST['mobilenumber'];
			$sex = $_POST['sex'];
			$city = $_POST['city'];
			$country = $_POST['country'];
			$date = $_POST['date'];
			$sql = "UPDATE dbcompany SET first_name ='$firstname', last_name ='$lastname', email ='$email',section ='$section',sex ='$sex',b_date ='$date',Country ='$country',city ='$city',mobile_number ='$mobilenumber' WHERE id = '$id'";
			mysqli_query($con, $sql);
			echo "<p class='success'>Update Successful</p>";
		}
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Employee page</title>
		<link rel="stylesheet" href="css/update_information.css">
	</head>
	<body>
		<div class="header">emoloyee leave managment system</div>
		<div class="aside">
			<img src="person.png">
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
			<h3>UPDATE EMPLOYEE DETAILS</h3>
			<div class="content">
				<div class="incont1">
					<span>emloyee username</span>
					<input type="text" placeholder="Enter Your Username" name="username" value="<?php echo $username; ?>" />
					<span class="span1">first name</span>
					<span class="span1">last name</span>
					<input type="text" placeholder="Enter Your First Name" class="span1" name="firstname" value="<?php echo $firstname; ?>" />
					<input type="text" placeholder="Enter Your Last Name" class="span1" name="lastname" value="<?php echo $lastname; ?>" />
					<span class="span">email</span>
					<input type="email" placeholder="Enter Your Email" class="span" name="email" value="<?php echo $email; ?>" />
					<span class="span">mobile number</span>
					<input type="text" placeholder="Enter Your Mobile Number" class="span" name="mobilenumber" value="<?php echo $mobilenumber; ?>" />
				</div>
				<div class="incont2">
					<span class="span">date</span>
					<input type="date" class="span" name="date" value="<?php echo $date; ?>" />
					<span class="span1">SEX</span>
					<span class="span1">Section</span>
					<select class="span1" name="sex" value="<?php echo $sex; ?>">
						<option value="male">Male</option>
						<option value="female">Female</option>
						<option value="other">Other</option>
					</select>
					
					<select class="span1" name="section" value="<?php echo $section; ?>">
						<option value="information technology">Information Technology</option>
						<option value="human resources">Human Resources</option>
						<option value="operations">Operations</option>
					</select>

					<span class="span1">City/Town</span>
					<span class="span1">country</span>
					<input type="text" placeholder="Enter Your City" class="span1" name="city" value="<?php echo $city; ?>" />
					<input type="text" placeholder="Enter Your Country" class="span1" name="country" value="<?php echo $country; ?>" />
					<input type="submit" class="btn" value="UPDATE" name="update" />
				</div>
			</div>
		</form>
		<footer>
			<h6>CopyRights Saved By Bacel &copy; 2021</h6>
		</footer>
	</body>
</html>