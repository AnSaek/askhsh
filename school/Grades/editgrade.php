<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Επεξεργασια στοιχειων</title>
    <style>
        table{
            font-family:arial;
            font-size:small;
            border: thin solid;
            background-color: orange;
        }
        body{
            background-image:url(../images/background.gif);
        }
        p{
            font-family:arial;
            font-weight:bold;
            text-align:center;
        }
        a{
            font-family:arial;
            font-size:small;
            font-weight:bold; 
            text-indent:10px;
        }
    </style>
</head>
<body>
 <?php 
 if(isset($_GET['student_id'])) $student_id = $_GET['student_id'];
 if(isset($_POST['update'])) $update = $_POST['update']
 ?> 
  <p>Επεξεργασια Βαθμου</p>
  <?php 
  $servername = "localhost";
  $username = "root";
  $password  = "";
  $dbname = "mathitologio_db";
  $connect = mysqli_connect($servername,$username,$password,$dbname);
  if(!$connect){
      die("Σφαλμα στην συνδεση με τη βαση δεδομενων");
  }
  if(isset($update)){
$student_id = $_POST['student_id'];
$subject = $_POST["subject"];
$surname = $_POST["surname"];
$name = $_POST["name"];
$class = $_POST["class"];
$grade = $_POST["grade"];
    $sql  = "UPDATE grades SET subject = '$subject',surname = '$surname',name = '$name',class = '$class', grade = '$grade' WHERE student_id = '$student_id'";
    $result = mysqli_query($connect,$sql);
    if($result) echo "Επιτυχης ενημερωση!<br>";
    echo '<a href="gradeslist.php">Επιστροφη</a>';
  }else if($student_id){}
    $result = mysqli_query($connect,"SELECT * FROM grades WHERE student_id='$student_id'");
    $myrow = mysqli_fetch_array($result);
    ?>
  <Form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <input type="hidden" name = "subject" value = "<?php echo $myrow["subject"] ?>">
    <input type="hidden" name = "student_id" value = "<?php echo $myrow["student_id"] ?>">
    <br>
    <table align="center">
      <tr>
        <td>Επωνυμο</td>
        <td><input type="text" name="surname" value ="<?php echo $myrow["surname"] ?>"><br></td>
    </tr>
    <tr>
        <td>Ονομα</td>
        <td><input type="text" name="name" value ="<?php echo $myrow["name"] ?>"><br></td>
    </tr>
    <tr>
        <td>Ταξη</td>
        <td><input type="text" name="class" value ="<?php echo $myrow["class"] ?>"><br></td>
    </tr>
    <tr>
        <td>Βαθμος</td>
        <td><input type="text" name="grade" value ="<?php echo $myrow["grade"] ?>"><br></td>
    </tr>
    </table>
    <p><input type="submit" name = "update" value="Ενημερωση"></p>
  </Form>
  <br>
  <br>
  <p><a href="gradeslist.php">Επιστροφη</a></p>  
</body>
</html>