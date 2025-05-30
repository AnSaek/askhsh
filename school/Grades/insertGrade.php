<html>
<?php
$subject = $_POST["subject"];
$surname = $_POST["surname"];
$name = $_POST["name"];
$class = $_POST["class"];
$grade = $_POST["grade"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mathitologio_db";
$connect = mysqli_connect($servername,$username,$password,$dbname);
if(!$connect){
  die("Σφαλμα στη συνδεση με τη βαση δεδομενων.");
}
mysqli_query($connect,"SET NAMES 'UTF8'");
$sql="INSERT INTO grades VALUES ('$subject','$surname','$name','$class','$grade')";
if($result=mysqli_query($connect,$sql)){
    echo "Η εγγραφη προστεθηκε";
}else{
    echo "Λαθος".mysqli_error($connect);
}
?>
<br>
<a href="insertGrade.html">Επιστροφη</a>
</html>