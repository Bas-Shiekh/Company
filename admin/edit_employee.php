<?php
session_start();
include("connection.php");
$id = $_GET['id'];
if(isset($id)){
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['update'])){
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
            $sql = "UPDATE dbcompany SET username = '$username', first_name ='$firstname', last_name ='$lastname', email ='$email',section ='$section',sex ='$sex',b_date ='$date',Country ='$country',city ='$city',mobile_number ='$mobilenumber' WHERE id ='$id'";
            mysqli_query($con,$sql);
            echo "<p class='success'>Update Successful</p>";
            header("location: manage_employee.php");
        }
    }
}else{
    header("location: manage_employee.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Employee page</title>
        <link rel="stylesheet" href="css/edit_employee.css">
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
        <h3>UPDATE EMPLOYEE DETAILS</h3>
        <form method="post">
        <div class="content">
            
            <div class="inside1">
                <span>emloyee username</span>
                <input type="text" placeholder="Enter Employee Username" name="username"/>
                <span class="span1">first name</span>
                <span class="span1">last name</span>
                <input type="text" placeholder="Enter Employee First Name"  class="span1" name="firstname"/>
                <input type="text" placeholder="Enter Employee Last Name" class="span1" name="lastname"/>
                <span class="span">email</span>
                <input type="email" placeholder="Enter Employee Email" class="span" name="email"/>
                <span class="span">mobile number</span>
                <input type="text" placeholder="Enter Employee Mobile Number" class="span" name="mobilenumber"/> 
            </div>
            <div>
                
                <select class="span1" name="sex">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                <span class="span1">date</span>
                <select class="span1" name="section">
                    <option value="information technology">Information Technology</option>
                    <option value="human resources">Human Resources</option>
                    <option value="operations">Operations</option>
                </select>
                <input type="date" class="span1" name="date"/>
                <span class="span1">City/Town</span>
                <span class="span1">country</span>
                <input type="text" placeholder="Enter Employee City" class="span1" name="city"/>
                <input type="text" placeholder="Enter Employee Country" class="span1" name="country"/>
                <input type="submit" class="button" value="UPDATE" name="update"/>
                
            </div>
            
        </div>
        </form>
    </body>
</html>