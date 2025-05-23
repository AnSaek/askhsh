<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Διαχειριση Μαθηματων</title>
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
<p>Διαχειριση Μαθηματων</p>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mathitologio_db";
$connect = mysqli_connect($servername,$username,$password,$dbname);
mysqli_query($connect,"SET NAMES 'UTF8'");
//Η βασικη εντολη Select
$sql = "SELECT * FROM subjects";
?>
<table align="center">
  <tr>
    <th>Κωδικος Μαθηματος</th>
    <th>Όνομα</th>
    <th>Ταξη</th>
    <th>Κωδικος Καθηγητη</th>
    <th>Επιλογες</th>
</tr>
<?php
$subjects = mysqli_query($connect,$sql);
if(mysqli_num_rows($subjects) == 0){
  echo("</table>");
  echo("<p> Λαθος στην ανακτηση των μαθηματων απο την βαση <br> " . "Error: ". mysqli_error($connect));
  exit(); 
}
$i = 0;
while($subject = mysqli_fetch_assoc($subjects)){
  if(fmod($i,2) == 0){
    echo '<tr style="background-color: #D7D7D7">';
  }else{
    echo '<tr style="background-color: #C0C0C0">';
  }
  echo("<tr>");
  $subject_id = $subject["subject_id"];
  $onoma = $subject["name"];
  $taxi = $subject["class"];
  $teacher_id  = $subject["teacher_id"];
  echo("<td>$subject_id</td>");
  echo("<td>$onoma</td>");
  echo("<td>$taxi</td>");
  echo("<td>$teacher_id</td>");
  echo("<td>[<a href='editsubject.php?subject_id=$subject_id'>"."Επεξεργασια<a>|"."<a href='deletesubject.php?subject_id=$subject_id'>"."Διαγραφη<a>]</td>\n");
  echo("</tr>\n");
$i++;
}
?>
</table>
<br>
<div><a href="../index.html">Επιστροφη</a></div>
</body>
</html>