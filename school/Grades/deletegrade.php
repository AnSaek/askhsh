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
$name = $_GET['name'];
$sql = "DELETE FROM grades WHERE name='$name'";
if($result=mysqli_query($connect,$sql)){
     echo "Η εγγραφη διαγραφηκε";    
}else{
    echo "Λαθος".mysqli_error($connect);
}
?>
<br>
<a href="gradeslist.php">Επιστροφη</a>
</html>