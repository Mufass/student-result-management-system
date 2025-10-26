<!-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profile</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="navbar">
  <h2>Student Portal</h2>
  <ul>
    <li><a href="dashbord.html">Home</a></li>
    <li><a href="stu_viewresult.html">View Result</a></li>
    <li><a href="stu_resulthistory.html">Result History</a></li>
    <li><a href="stu_notification.html">Notifications</a></li>
    <li><a href="stu_viewprofile.html">Profile</a></li>
    <li><a href="stu_login.html">Logout</a></li>
  </ul>
</div>

<div class="container">
  <h2>Student Profile</h2>
  <p><b>Name:</b> A. Perera</p>
  <p><b>Student ID:</b> 2023MIT001</p>
  <p><b>Course:</b> MIT</p>
  <p><b>Department:</b> IT</p>
  <p><b>Email:</b> aperera@uni.lk</p>
  <button>Change Password</button>
</div>

</body>
</html> -->
<?php
session_start();
include("../admin/db/db.php");
if(!isset($_SESSION['student_id'])){
    header("Location: ../index.php");
    exit();
}

$student_id = $_SESSION['student_id'];
$query = "SELECT * FROM students WHERE student_id='$student_id'";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="navbar">
    <a href="dashboard.php">Dashboard</a>
    <a href="stu_viewprofile.php">Profile</a>
    <a href="stu_viewresult.php">View Result</a>
    <a href="stu_notification.php">Notifications</a>
    <a href="logout.php" style="float:right;">Logout</a>
</div>

<div class="content">
    <h2>Profile Information</h2>
    <table>
        <tr><th>Registration No</th><td><?php echo $row['student_reg_no']; ?></td></tr>
        <tr><th>Full Name</th><td><?php echo $row['full_name']; ?></td></tr>
        <tr><th>Email</th><td><?php echo $row['email']; ?></td></tr>
        <tr><th>Course</th><td><?php echo $row['course_id']; ?></td></tr>
        <tr><th>Department</th><td><?php echo $row['department']; ?></td></tr>
        <tr><th>Year</th><td><?php echo $row['year_of_study']; ?></td></tr>
    </table>
</div>
</body>
</html>
