<?php
session_start();
include("connection.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['add'])){
        $username = $_POST['username'];
        $query = "SELECT username FROM dbcompany WHERE username = '$username'";
        $results = mysqli_query($con,$query);
        $user_data = mysqli_fetch_assoc($results);
            if($user_data['username'] !== $username){
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];
                if($password === $confirm_password){
                    $first_name = $_POST['firstname'];
                    $last_name = $_POST['lastname'];
                    $email = $_POST['email'];
                    $newpassword = $password;
                    $sex = $_POST['sex'];
                    $section = $_POST['section'];
                    $b_date = $_POST['date'];
                    $country = $_POST['country'];
                    $city = $_POST['city'];
                    $address = $_POST['address'];
                    $mobile_number = $_POST['mobilenumber'];
                    $reg_date = date('Y-m-d');
                    $sql = "INSERT INTO `dbcompany`(`id`, `username`, `password`, `first_name`, `last_name`, `email`, `Country`, `city`, `address`, `section`, `sex`, `b_date`, `reg_date`,`mobile_number`) 
                    VALUES (NULL,'$username','$newpassword','$first_name','$last_name','$email','$country','$city','$address','$section','$sex','$b_date','$reg_date','$mobile_number')";
                    $result = mysqli_query($con,$sql);
                    if(!$result){
                        die("error query");
                    }
                    echo "<p class='success'>New Employee Was Adding</p>";
                }else{
                    echo "<p class='error'>Password Most Be Like Confirm Password</p>";
                }
                
            }else{
                echo "<p class='error'>Username Already Reserved In Our DataBase</p>";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Employee page</title>
        <link rel="stylesheet" href="css/add_employee.css">
    </head>
    <body>
        <div class="header">emoloyee leave managment system</div>
        <div class="aside">
            <img src="person.png" style="border-radius: 50%; width: 80px; height: 80px; background-color: white;">
            <div class="info">
                <p>admin</p>
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
        <h3>ADD EMPLOYEE</h3>
        <form method="post">
        <div class="content">
            
            <div class="inside1">
                <input type="text" placeholder="Enter Username" name="username"/>
                <input type="text" placeholder="Enter First Name"  class="span1" name="firstname"/>
                <input type="text" placeholder="Enter Last Name" class="span1" name="lastname"/>
                <input type="email" placeholder="Enter Email" class="span" name="email"/>
                <input type="password" placeholder="Enter Password" class="span" name="password"/>
                <input type="password" placeholder="Enter Confirm Password" class="span" name="confirm_password"/>
                
                
            </div>
            <div>
                
                <select class="span1" name="sex" style="padding: 20px;">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                <select class="span1" name="section" style="padding: 20px;">
                    <option value="information technology">Information Technology</option>
                    <option value="human resources">Human Resources</option>
                    <option value="operations">Operations</option>
                </select>
                <input type="date" class="span1" name="date" />
                <input type="text" placeholder="Enter Country" class="span1" name="country"/>
                <input type="text" placeholder="Enter City" class="span1" name="city"/>
                <input type="text" placeholder="Enter Address" class="span1" name="address"/>
                <input type="text" placeholder="Enter Mobile Number" class="span" name="mobilenumber"/>
                <input type="submit" class="button" value="ADD" name="add"/>
                
            </div>
            
        </div>
        </form>
    </body>
</html>