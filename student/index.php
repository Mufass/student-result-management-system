<!-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Login</title>
<link rel="stylesheet" href="css/style.css">
<style>
body { display: flex; justify-content: center; align-items: center; height: 100vh; background: linear-gradient(to right, #2e86de, #00b894); }
.login-box {
  background: white;
  padding: 40px;
  border-radius: 10px;
  width: 350px;
  text-align: center;
}
input {
  width: 100%;
  padding: 10px;
  margin: 8px 0;
  border-radius: 5px;
  border: 1px solid #ccc;
}
button { width: 100%; }
</style>
</head>
<body>
<div class="login-box">
  <h2>Student Login</h2>
  <form action="dashboard.html">
    <input type="text" placeholder="Student ID / Reg No" required><br>
    <input type="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
  </form>
</div>
</body>
</html> -->
<?php
session_start();
include("../admin/db/db.php");

if(isset($_POST['login'])){
    $reg_no = $_POST['reg_no'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM students WHERE student_reg_no='$reg_no' AND password ='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['student_id'] = $row['student_id'];
        $_SESSION['student_name'] = $row['full_name'];
        header("Location: dashboard.php ");
        exit();
    } else {
        $error = "Invalid Registration No or Password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="login-box">
    <h2>Student Login</h2>
    <form method="POST">
        <input type="text" name="reg_no" placeholder="Registration No" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit" name="login">Login</button>
    </form>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
</div>
</body>
</html>

