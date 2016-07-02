<?php
  try{
    $conn = new PDO('pgsql:host=localhost;dbname=highcharts_db','chitra','1234');

     $result = $conn->query("SELECT * FROM highcharts_php;");
    $db = [];
     while($row = $result->fetch(PDO::FETCH_ASSOC)) {

     echo $row['names'] . "\t" . $row['visits']."<br>";
     }

  }
  catch(PDOException $e){
    echo $e->getMessage();
  }

  $conn = null;
 ?>
