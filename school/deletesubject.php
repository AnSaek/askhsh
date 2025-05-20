<html>
<?php
$servername = "localhost";
$username = "root";
$password  = "";
$dbname = "mathitologio_db";
$connect = mysqli_connect($servername,$username,$password,$dbname);
if(!$connect){
    die("Σφαλμα στην συνδεση με τη βαση δεδομενων");
}
mysqli_query($connect,"SET NAMES 'UTF8'");
$subject_id = $_GET['subject_id'];
$sql = "DELETE FROM subjects WHERE subject_id =$subject_id";
if($result=mysqli_query($connect,$sql)){
     echo "Η εγγραφη διαγραφηκε";    
}else{
    echo "Λαθος".mysqli_error($connect);
}
?>
<br>
<a href="subjectlist.php">Επιστροφη</a>
</html>