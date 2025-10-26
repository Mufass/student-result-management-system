<?php
session_start();
include 'db/db.php';
if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'header.php'; ?>

<div class="content">
<h2>Welcome, Admin 👋</h2>
<p>Manage Students, Upload Results, and Publish Notifications</p>

<div class="cards">
  <a href="add_student.php" class="card">Add Student</a>
  <a href="upload_result.php" class="card">Upload Result</a>
  <a href="add_notification.php" class="card">Add Notification</a>
  <a href="manage_students.php" class="card">Manage Students</a>
</div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
