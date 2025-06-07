<html>
<?php
$subject_id = $_POST["subject_id"];
$name = $_POST["name"];
$class = $_POST["class"];
$teacher_id = $_POST["teacher_id"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mathitologio_db";
$connect = mysqli_connect($servername,$username,$password,$dbname);
if(!$connect){
  die("Σφαλμα στη συνδεση με τη βαση δεδομενων.");
}
mysqli_query($connect,"SET NAMES 'UTF8'");
$sql="INSERT INTO subjects VALUES ('$subject_id','$name','$class','$teacher_id')";
if($result=mysqli_query($connect,$sql)){
    echo "Η εγγραφη προστεθηκε";
}else{
    echo "Λαθος".mysqli_error($connect);
}
?>
<br>
<a href="insertSubject.html">Επιστροφη</a>
</html>