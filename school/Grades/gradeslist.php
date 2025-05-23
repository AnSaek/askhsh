<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Διαχειριση Βαθμων</title>
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
<p>Διαχειριση Βαθμων</p>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mathitologio_db";
$connect = mysqli_connect($servername,$username,$password,$dbname);
mysqli_query($connect,"SET NAMES 'UTF8'");
//Η βασικη εντολη Select
$sql = "SELECT * FROM grades";
?>
<table align="center">
  <tr>
    <th>Μαθημα</th>
    <th>Επωνυμο</th>
    <th>Όνομα</th>
    <th>Ταξη</th>
    <th>Βαθμος</th>
    <th>Επιλογες</th>
</tr>
<?php
$grades = mysqli_query($connect,$sql);
if(mysqli_num_rows($grades) == 0){
  echo("</table>");
  echo("<p> Λαθος στην ανακτηση των βαθμων απο την βαση <br> " . "Error: ". mysqli_error($connect));
  exit(); 
}
$i = 0;
while($grade = mysqli_fetch_assoc($grades)){
  if(fmod($i,2) == 0){
    echo '<tr style="background-color: #D7D7D7">';
  }else{
    echo '<tr style="background-color: #C0C0C0">';
  }
  echo("<tr>");
$subject = $grade["subject"];
$surname = $grade["surname"];
$name = $grade["name"];
$class = $grade["class"];
$grade = $grade["grade"];
  echo("<td>$subject</td>");
  echo("<td>$surname</td>");
  echo("<td>$name</td>");
  echo("<td>$class</td>");
  echo("<td>$grade</td>");
  echo("<td>[<a href='editgrade.php?name=$name'>"."Επεξεργασια<a>|"."<a href='deletegrade.php?name=$name'>"."Διαγραφη<a>]</td>\n");
  echo("</tr>\n");
$i++;
}
?>
</table>
<br>
<div><a href="../index.html">Επιστροφη</a></div>
</body>
</html>