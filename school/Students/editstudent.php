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
  <p>Επεξεργασια Μαθητη</p>
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
    $eponymo = $_POST['eponymo'];
    $onoma = $_POST['onoma'];
    $taxi = $_POST['taxi'];
    $tmima = $_POST['tmima'];
    $sql  = "UPDATE students SET student_id = '$student_id',eponymo = '$eponymo',onoma = ' $onoma',taxi = '$taxi', tmima = '$tmima' WHERE student_id = '$student_id'";
    $result = mysqli_query($connect,$sql);
    if($result) echo "Επιτυχης ενημερωση!<br>";
    echo '<a href="studentslist.php">Επιστροφη</a>';
  }else if($student_id){}
    $result = mysqli_query($connect,"SELECT * FROM students WHERE student_id=$student_id");
    $myrow = mysqli_fetch_array($result);
    ?>
  <Form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <input type="hidden" name = "student_id" value = "<?php echo $myrow["student_id"] ?>">
    <br>
    <table align="center">
      <tr>
        <td>Επωνυμο</td>
        <td><input type="text" name="eponymo" value ="<?php echo $myrow["eponymo"] ?>"><br></td>
    </tr>
    <tr>
        <td>Ονομα</td>
        <td><input type="text" name="onoma" value ="<?php echo $myrow["onoma"] ?>"><br></td>
    </tr>
    <tr>
        <td>Ταξη</td>
        <td><input type="text" name="taxi" value ="<?php echo $myrow["taxi"] ?>"><br></td>
    </tr>
    <tr>
        <td>Τμημα</td>
        <td><input type="text" name="tmima" value ="<?php echo $myrow["tmima"] ?>"><br></td>
    </tr>
    </table>
    <p><input type="submit" name = "update" value="Ενημερωση"></p>
  </Form>
  <br>
  <br>
  <p><a href="studentslist.php">Επιστροφη</a></p>  
</body>
</html>