<?php
session_start();
include 'db/db.php';
if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}

if(isset($_POST['upload'])){
    $student_id = $_POST['student_id'];
    $subject = $_POST['subject'];
    $marks = $_POST['marks'];
    $grade = $_POST['grade'];
    $semester = $_POST['semester'];

    $insert = "INSERT INTO results(student_id, subject, marks, grade, semester)
               VALUES('$student_id', '$subject', '$marks', '$grade', '$semester')";
    if(mysqli_query($conn, $insert)){
        $msg = "Result uploaded successfully!";
    } else {
        $msg = "Error uploading result.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Upload Result</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'header.php'; ?>
<div class="content">
<h2>Upload Student Result</h2>
<form method="POST">
    <input type="text" name="student_id" placeholder="Student ID" required><br>
    <input type="text" name="subject" placeholder="Subject" required><br>
    <input type="number" name="marks" placeholder="Marks" required><br>
    <input type="text" name="grade" placeholder="Grade" required><br>
    <input type="text" name="semester" placeholder="Semester" required><br>
    <button type="submit" name="upload">Upload</button>
</form>
<p><?php if(isset($msg)) echo $msg; ?></p>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
