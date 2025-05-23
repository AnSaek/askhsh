<html>
<?php
$student_id = $_POST["student_id"];
$eponymo = $_POST["eponymo"];
$onoma = $_POST["onoma"];
$taxi = $_POST["taxi"];
$tmima = $_POST["tmima"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mathitologio_db";
$connect = mysqli_connect($servername,$username,$password,$dbname);
if(!$connect){
  die("Σφαλμα στη συνδεση με τη βαση δεδομενων.");
}
mysqli_query($connect,"SET NAMES 'UTF8'");
$sql="INSERT INTO students VALUES ('$student_id','$eponymo','$onoma','$taxi','$tmima')";
if($result=mysqli_query($connect,$sql)){
    echo "Η εγγραφη προστεθηκε";
}else{
    echo "Λαθος".mysqli_error($connect);
}
?>
<br>
<a href="insert.html">Επιστροφη</a>
</html>