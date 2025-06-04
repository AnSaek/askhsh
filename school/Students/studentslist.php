<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Διαχειριση Μαθητων</title>
    <style type="text/css">
     body{
        background-image:url(../images/background.gif);
        font-family:arial; 
     }
     p{
        font-size:medium;
        font-weight:bold;
        text-align:center;
     }
     div{

     }
     table{
        font-size:small;
     }
     th{
        background-color:#A0C9C9;
     }
     div{
        font-size:small; 
        font-weight:bold;
        text-align:center;
     }
   </style> 
</head>
<body>
<p>Διαχειριση Μαθητων</p>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mathitologio_db";
$connect = mysqli_connect($servername,$username,$password,$dbname);
mysqli_query($connect,"SET NAMES 'UTF8'");
//Η βασικη εντολη Select
$sql = "SELECT * FROM students";
?>
<table align="center">
  <tr>
    <th>Κωδικος</th>
    <th>Επωνυμο</th>
    <th>Όνομα</th>
    <th>Ταξη</th>
    <th>Τμημα</th>
    <th>Επιλογες</th>
</tr>
<?php
$students = mysqli_query($connect,$sql);
if(mysqli_num_rows($students) == 0){
  echo("</table>");
  echo('<p> Λαθος στην ανακτηση των μαθητων απο την βαση <br>' . 'Error:'. mysqli_error($connect)); 
  echo('<div><a href="../index.html">Επιστροφη</a></div>');
  exit();
}
$i = 0;
while($student = mysqli_fetch_assoc($students)){
  if(fmod($i,2) == 0){
    echo '<tr style="background-color: #D7D7D7">';
  }else{
    echo '<tr style="background-color: #C0C0C0">';
  }
  echo("<tr>");
  $student_id = $student["student_id"];
  $eponymo = $student["eponymo"];
  $onoma = $student["onoma"];
  $taxi = $student["taxi"];
  $tmima  = $student["tmima"];
  echo("<td>$student_id</td>");
  echo("<td>$eponymo</td>");
  echo("<td>$onoma</td>");
  echo("<td>$taxi</td>");
  echo("<td>$tmima</td>");
  echo("<td>[<a href='editstudent.php?student_id=$student_id'>"."Επεξεργασια<a>|"."<a href='deletestudent.php?student_id=$student_id'>"."Διαγραφη<a>]</td>\n");
  echo("</tr>\n");
$i++;
}
?>
</table>
<br>
<div><a href="../index.html">Επιστροφη</a></div>
</body>
</html>