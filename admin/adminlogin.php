<?php
session_start();
if(isset($_COOKIE['username'])){
    $_SESSION['username'] = $_COOKIE['username'];
}
if(isset($_SESSION['username'])){
    header("location: dashboard.php");
}
include("connection.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(!empty($username) && !empty($password) && !is_numeric($username)){
        $sql = "SELECT username, password FROM adminlog WHERE username = '$username'";
        $result = mysqli_query($con,$sql);
        $user_data = mysqli_fetch_assoc($result);
            if($result && mysqli_num_rows($result) > 0){
                if($user_data['username'] == $username){
                    if(isset($_POST['checked'])){
                        setcookie("username", $username, time()+(5*24*60*60), "/");
                        $_SESSION['username'] = $_COOKIE['username'];
                    }else{
                        $_SESSION['username'] = $username;
                    }
                    if($user_data['password'] === $password){
                        header("location: dashboard.php");
                        die;
                    }else{
                        echo "<center><h2>invalid password</h2></center>";
                    }
                }
            }else{
                echo "<center><h2>invalid username</h2></center>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Employee login</title>
        <style>
                *{
                    margin: 0px;
                    padding: 0px;
                }
                body{
                    background-color: #eee;
                    font-family: Arial, Helvetica, sans-serif;
                }
                .sec{
                    margin: auto;
                    height: 100vh;
                    width: 100vh;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                }
                .log-box{
                    padding: 20px;
                    background-color: white;
                    justify-content: center;
                    align-items: center;
                    width: 500px;
                    display: flex;
                    justify-content: space-between;
                    align-items: flex-start;
                    flex-direction: column;
                    box-shadow: 0 0 10px 5px #ddd;
                }
                input{
                    display: block;
                    margin: 20px;
                    width: 90%;
                    border: 0px;
                    border-bottom: 1px solid #ddd;
                    padding: 10px;
                }
                .checkbox{
                    width: auto;
                    margin: auto;
                    margin-right: 10px;
                    margin-left: 40px;
                    cursor: pointer;
                }
                .span{
                    display: flex;
                    justify-content: flex-start;
                    align-items: flex-start;
                }
                span{
                    opacity: 0.75;
                }
                h3{
                    color: rgb(221, 28, 28);
                    text-transform: uppercase;
                    font-weight: bolder;
                }
                h2{
                    color: rgb(221, 28, 28);
                    text-transform: capitalize;
                    font-weight: bolder;
                    font-size: 30px;
                }
                .button{
                    background-color: rgb(0, 172, 37);
                    color: white;
                    text-transform: uppercase;
                    font-family: Arial, Helvetica, sans-serif;
                    border: 0px;
                    font-size: 26px;
                    padding: 10px 30px;
                    display: block;
                    align-self: center;
                    margin: 30px;
                    box-shadow: 0 0 5px 0px rgb(0, 172, 37);
                    cursor: pointer;
                }
        </style>
    </head>
    <body>
        <div class="sec">
            <h2>leave managment system</h2><br />
            <form method="post" >
                <div class="log-box">
                    <h3>admin login</h3>
                    <input type="text" placeholder="Enter Admin Username" name="username" />
                    <input type="password" placeholder="Enter Password" name="password" />
                    <div class="span">
                        <input type="checkbox" class="checkbox" name="checked"/>
                        <span>remmeber login?</span>
                    </div>
                    <input type="submit" class="button" value="login" name="login"/>
                </div>
            </form>
        </div> 
    </body>
</html>