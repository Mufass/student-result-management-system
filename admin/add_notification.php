<?php
session_start();
include 'db/db.php';
if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}

if(isset($_POST['add'])){
    $title = $_POST['title'];
    $message = $_POST['message'];
    $date = date("Y-m-d");

    $insert = "INSERT INTO notifications(title, message, date) VALUES('$title', '$message', '$date')";
    if(mysqli_query($conn, $insert)){
        $msg = "Notification added successfully!";
    } else {
        $msg = "Error adding notification.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Add Notification</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'header.php'; ?>
<div class="content">
<h2>Add New Notification</h2>
<form method="POST">
    <input type="text" name="title" placeholder="Title" required><br>
    <textarea name="message" placeholder="Message" required></textarea><br>
    <button type="submit" name="add">Add Notification</button>
</form>
<p><?php if(isset($msg)) echo $msg; ?></p>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
