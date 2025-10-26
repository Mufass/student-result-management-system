<!-- 

<style>
/* body { font-family: Arial; background: #f5f6fa; padding: 40px; }
h2 { text-align: center; color: #2e86de; }
.table-box {
  background: white;
  padding: 20px;
  border-radius: 10px;
  max-width: 700px;
  margin: 0 auto;
  box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}
th, td {
  border: 1px solid #ccc;
  padding: 10px;
  text-align: center;
}
th { background: #2e86de; color: white; } */
.download-btn {
  margin-top: 15px;
  background: #00b894;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}
.download-btn:hover { background: #01936a; }
</style>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Result</title>
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
  <h2>Semester 2 Results</h2>
  <table border="1" width="100%" cellpadding="10" cellspacing="0">
    <tr style="background:#2e86de;color:white;">
      <th>Subject</th><th>Marks</th><th>Grade</th><th>GPA</th>
    </tr>
    <tr><td>Programming Fundamentals</td><td>85</td><td>A</td><td>4.0</td></tr>
    <tr><td>Database Systems</td><td>75</td><td>B+</td><td>3.5</td></tr>
    <tr><td>Web Development</td><td>90</td><td>A+</td><td>4.2</td></tr>
  </table>
  <p><b>Total GPA:</b> 3.9</p>
  <button class="download-btn">Download PDF</button>
</div>

</body>
</html>
 -->

 <?php
session_start();
include("../admin/db/db.php");
if(!isset($_SESSION['student_id'])){
    header("Location: ../index.php");
    exit();
}

$student_id = $_SESSION['student_id'];

$query = "
SELECT r.*, s.subject_name, s.subject_code
FROM results r
JOIN subjects s ON r.subject_id = s.subject_id
WHERE r.student_id='$student_id'
ORDER BY r.semester ASC
";

$res = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Result</title>
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
    <h2>My Results</h2>
    <table>
        <tr>
            <th>Semester</th>
            <th>Subject Code</th>
            <th>Subject Name</th>
            <th>Marks</th>
            <th>Grade</th>
            <th>GPA</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($res)){ ?>
        <tr>
            <td><?php echo $row['semester']; ?></td>
            <td><?php echo $row['subject_code']; ?></td>
            <td><?php echo $row['subject_name']; ?></td>
            <td><?php echo $row['marks']; ?></td>
            <td><?php echo $row['grade']; ?></td>
            <td><?php echo $row['gpa']; ?></td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
