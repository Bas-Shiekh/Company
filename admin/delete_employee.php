<?php
session_start();
include("connection.php");
$id = $_GET['id'];
$query = "SELECT username FROM dbcompany WHERE id = '$id'";
$results = mysqli_query($con,$query);
$user_data = mysqli_fetch_assoc($results);
$sql = "DELETE FROM `dbcompany` WHERE id = '$id'";
mysqli_query($con,$sql);
header("location: manage_employee.php");
$querysql = "DELETE FROM `leavedb` WHERE id = '$id'";
$results = mysqli_query($con,$querysql);
$user_data = mysqli_fetch_assoc($results);