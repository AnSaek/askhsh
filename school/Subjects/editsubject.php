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
 if(isset($_GET['subject_id'])) $subject_id = $_GET['subject_id'];
 if(isset($_POST['update'])) $update = $_POST['update']
 ?> 
  <p>Επεξεργασια Μαθηματος</p>
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
    $subject_id = $_POST['subject_id'];
    $onoma = $_POST['name'];
    $taxi = $_POST['class'];
    $teacher_id = $_POST['teacher_id'];
    $sql  = "UPDATE subjects SET subject_id = '$subject_id',name = ' $onoma',class = '$taxi', teacher_id = '$teacher_id' WHERE subject_id = '$subject_id'";
    $result = mysqli_query($connect,$sql);
    if($result) echo "Επιτυχης ενημερωση!<br>";
    echo '<a href="subjectlist.php">Επιστροφη</a>';
  }else if($subject_id){}
    $result = mysqli_query($connect,"SELECT * FROM subjects WHERE subject_id = '$subject_id'");
    $myrow = mysqli_fetch_array($result);
    ?>
  <Form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <input type="hidden" name = "subject_id" value = "<?php echo $myrow["subject_id"] ?>">
    <br>
    <table align="center">
      <tr>
        <td>Ονομα</td>
        <td><input type="text" name="name" value ="<?php echo $myrow["name"] ?>"><br></td>
    </tr>
    <tr>
        <td>Ταξη</td>
        <td><input type="text" name="class" value ="<?php echo $myrow["class"] ?>"><br></td>
    </tr>
    <tr>
        <td>Κωδικος Καθηγητη</td>
        <td><input type="text" name="teacher_id" value ="<?php echo $myrow["teacher_id"] ?>"><br></td>
    </tr>
    </table>
    <p><input type="submit" name = "update" value="Ενημερωση"></p>
  </Form>
  <br>
  <br>
  <p><a href="subjectlist.php">Επιστροφη</a></p>  
</body>
</html>