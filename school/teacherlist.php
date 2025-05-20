<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Διαχειριση Καθηγητων</title>
    <style type="text/css">
     body{
        background-image:url(background.gif);
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
<p>Διαχειριση Καθηγητων</p>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mathitologio_db";
$connect = mysqli_connect($servername,$username,$password,$dbname);
mysqli_query($connect,"SET NAMES 'UTF8'");
//Η βασικη εντολη Select
$sql = "SELECT * FROM teachers";
?>
<table align="center">
  <tr>
    <th>Κωδικος</th>
    <th>Επωνυμο</th>
    <th>Όνομα</th>
    <th>Αντικειμενο</th>
    <th>Επιλογες</th>
</tr>
<?php
$teachers = mysqli_query($connect,$sql);
if(mysqli_num_rows($teachers) == 0){
  echo("</table>");
  echo("<p> Λαθος στην ανακτηση των Καθηγητων απο την βαση <br> " . "Error: ". mysqli_error($connect));
  exit(); 
}
$i = 0;
while($teacher = mysqli_fetch_assoc($teachers)){
  if(fmod($i,2) == 0){
    echo '<tr style="background-color: #D7D7D7">';
  }else{
    echo '<tr style="background-color: #C0C0C0">';
  }
  echo("<tr>");
  $teacher_id = $teacher["teacher_id"];
  $eponymo = $teacher["eponymo"];
  $onoma = $teacher["onoma"];
  $subject = $teacher["subject"];
  echo("<td>$teacher_id</td>");
  echo("<td>$eponymo</td>");
  echo("<td>$onoma</td>");
  echo("<td>$subject</td>");
  echo("<td>[<a href='editteacher.php?teacher_id=$teacher_id'>"."Επεξεργασια<a>|"."<a href='deleteteacher.php?teacher_id=$teacher_id'>"."Διαγραφη<a>]</td>\n");
  echo("</tr>\n");
$i++;
}
?>
</table>
<br>
<div><a href="index.html">Επιστροφη</a></div>
</body>
</html>