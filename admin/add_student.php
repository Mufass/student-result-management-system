<?php
session_start();
include 'db/db.php';
if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}
if(isset($_POST['add'])){
    $student_reg_no = $_POST['student_reg_no'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $password = $_POST['password'];

    $insert = "INSERT INTO students(student_reg_no, full_name, email, department, password)
               VALUES('$student_reg_no', '$full_name', '$email', '$department', '$password')";
    if(mysqli_query($conn, $insert)){
        $msg = "Student added successfully!";
    } else {
        $msg = "Error adding student.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Add Student</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'header.php'; ?>
<div class="content">
<h2>Add New Student</h2>
<form method="POST">
    <input type="text" name="student_reg_no" placeholder="Student ID" required><br>
    <input type="text" name="full_name" placeholder="Full Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="text" name="department" placeholder="Course" required><br>
    <input type="password" name="password" placeholder="Default Password" required><br>
    <button type="submit" name="add">Add Student</button>
</form>
<p><?php if(isset($msg)) echo $msg; ?></p>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
