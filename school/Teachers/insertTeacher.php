<html>
<?php
$teacher_id = $_POST["teacher_id"];
$eponymo = $_POST["eponymo"];
$onoma = $_POST["onoma"];
$subject = $_POST["subject"];
//$taxi = $_POST["taxi"];
//$tmima = $_POST["tmima"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mathitologio_db";
$connect = mysqli_connect($servername,$username,$password,$dbname);
if(!$connect){
  die("Σφαλμα στη συνδεση με τη βαση δεδομενων.");
}
mysqli_query($connect,"SET NAMES 'UTF8'");
$sql="INSERT INTO teachers VALUES ('$teacher_id','$eponymo','$onoma','$subject')";
if($result=mysqli_query($connect,$sql)){
    echo "Η εγγραφη προστεθηκε";
}else{
    echo "Λαθος".mysqli_error($connect);
}
?>
<br>
<a href="insertTeacher.html">Επιστροφη</a>
</html>