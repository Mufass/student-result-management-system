<!-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
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
  <h2>Welcome, A. Perera</h2>
  <p><b>Student ID:</b> 2023MIT001</p>
  <p><b>Course:</b> Management Information Technology</p>
  <p><b>Department:</b> IT</p>

  <h3>Latest Result Summary</h3>
  <p>Semester 2 GPA: <b>3.8</b></p>
  <button onclick="window.location.href='stu_viewresult.html'">View Full Result</button>
</div>

</body>
</html> -->
<?php
session_start();
include("../admin/db/db.php");
if(!isset($_SESSION['student_id'])){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
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
    <h2>Welcome, <?php echo $_SESSION['student_name']; ?> 👋</h2>
    <p>This is your student dashboard. Use the menu to view your results, profile, and notifications.</p>
</div>
</body>
</html>
