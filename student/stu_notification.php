 <!-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Notifications</title>
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
  <h2>Notifications</h2>
  <div style="border-left:6px solid #2e86de; padding:10px; margin-bottom:10px;">
    <h4>Semester 2 Results Released</h4>
    <p>Your results are now available under the “View Result” section.</p>
    <small>Published: Oct 25, 2025</small>
  </div>
  
  <div style="border-left:6px solid #2e86de; padding:10px;">
    <h4>Exam Registration Open</h4>
    <p>Semester 3 exam registration closes on Nov 10, 2025.</p>
    <small>Published: Oct 20, 2025</small>
  </div>
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

$res = mysqli_query($conn, "SELECT * FROM notifications ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Notifications</title>
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
    <h2>Notifications</h2>
    <ul>
    <?php while($row = mysqli_fetch_assoc($res)){ ?>
        <li>
            <strong><?php echo $row['title']; ?></strong><br>
            <?php echo $row['message']; ?><br>
            <small><?php echo date('d-M-Y H:i', strtotime($row['created_at'])); ?></small>
        </li>
    <?php } ?>
    </ul>
</div>
</body>
</html>
