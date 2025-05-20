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
            background-image:url(background.gif);
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
 if(isset($_GET['teacher_id'])) $teacher_id = $_GET['teacher_id'];
 if(isset($_POST['update'])) $update = $_POST['update']
 ?> 
  <p>Επεξεργασια Καθηγητη</p>
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
    $teacher_id = $_POST['teacher_id'];
    $eponymo = $_POST['eponymo'];
    $onoma = $_POST['onoma'];
    $subject = $_POST['subject'];
    //$tmima = $_POST['tmima'];
    $sql  = "UPDATE teachers SET teacher_id = '$teacher_id',eponymo = '$eponymo',onoma = ' $onoma',subject = '$subject' WHERE teacher_id = '$teacher_id'";
    $result = mysqli_query($connect,$sql);
    if($result) echo "Επιτυχης ενημερωση!<br>";
    echo '<a href="teacherlist.php">Επιστροφη</a>';
  }else if($teacher_id){}
    $result = mysqli_query($connect,"SELECT * FROM teachers WHERE teacher_id=$teacher_id");
    $myrow = mysqli_fetch_array($result);
    ?>
  <Form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <input type="hidden" name = "teacher_id" value = "<?php echo $myrow["teacher_id"] ?>">
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
        <td>Αντικειμενο</td>
        <td><input type="text" name="subject" value ="<?php echo $myrow["subject"] ?>"><br></td>
    </tr>
    </table>
    <p><input type="submit" name = "update" value="Ενημερωση"></p>
  </Form>
  <br>
  <br>
  <p><a href="teacherlist.php">Επιστροφη</a></p>  
</body>
</html>