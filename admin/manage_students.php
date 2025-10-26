<?php
session_start();
include 'db/db.php';
if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}
$res = mysqli_query($conn, "SELECT * FROM students");
?>
<!DOCTYPE html>
<html>
<head>
<title>Manage Students</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'header.php'; ?>

<div class="content">
<h2>All Students</h2>
<table>
<tr><th>ID</th><th>Name</th><th>Email</th><th>Department</th></tr>
<?php while($row = mysqli_fetch_assoc($res)){ ?>
<tr>
  <td><?php echo $row['student_id']; ?></td>
  <td><?php echo $row['full_name']; ?></td>
  <td><?php echo $row['email']; ?></td>
  <td><?php echo $row['department']; ?></td>
</tr>
<?php } ?>
</table>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
