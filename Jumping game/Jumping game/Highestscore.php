<?php

   require 'config.php';
   include "mainP.php";
 
   
   if(isset($_POST['submit'])){
     $score = $_POST['score'];
     $submit = $_POST['submit'];

   
   $update =  "UPDATE tb_user SET Score ='$score'  WHERE username='$row[username]' and '$score' > '$row[Score]'";
   $queryy="SELECT MAX(Score) as 'score 'from 'tb_user'";
   mysqli_query($conn,$update);



   }
 
   $sql="SELECT * FROM tb_user ORDER BY Score DESC";
   $res= mysqli_query($conn, $sql) or die;
   if(mysqli_num_rows($res) > 0){
      echo "<table>";
      echo "<tr>";
                echo "<th>username</th>";
                echo "<th>highest score</th>";
       echo "</tr>";
       while($row = mysqli_fetch_array($res)){
         echo "<tr>";
             echo "<td>" . $row['username'] . "</td>";
             echo "<td>" . $row['Score'] . "</td>";
             echo "</tr>";
            }
         }
         echo "</table>";




?>



