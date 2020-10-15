<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bhdf";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  

  
  $sql = "INSERT INTO `employees`(`fullname`, `dateofshift`, `timeofshift`, `fever`, `coughcolds`, `bodypains`, 
  `sorethroat`, `question8`, `question9`, `question10`, `question11`, `currentaddress`, `travelledaddress`)
  VALUES (:fullname, :dateofshift, :timeofshift, :Q1fever, :Q2CandC, :Q3Bpains, :Q4Sorethroat, :Q5f2f, :Q6directcare, :Q7travelledPH, :Q8travelledBin, :currentaddress, :areatravelled)";
  // use exec() because no results are returned
  
  $stmt=$conn->prepare($sql);
  $stmt->bindParam(":fullname", $fullname);
  $stmt->bindParam(":dateofshift", $dateofshift);
  $stmt->bindParam(":timeofshift", $timeofshift);
  $stmt->bindParam(":Q1fever", $fever);
  $stmt->bindParam(":Q2CandC", $coughcolds);
  $stmt->bindParam(":Q3Bpains", $bodypains);
  $stmt->bindParam(":Q4Sorethroat", $sorethroat);
  $stmt->bindParam(":Q5f2f", $question5);
  $stmt->bindParam(":Q6directcare", $question6);
  $stmt->bindParam(":Q7travelledPH", $question7);
  $stmt->bindParam(":Q8travelledBin", $question8);
  $stmt->bindParam(":currentaddress", $currentaddress);
  $stmt->bindParam(":areatravelled", $travelledaddress);
  
  $form = $_POST;
  $fullname = $form[ 'fullname' ];
  $dateofshift = $form[ 'dateofshift' ];
  $timeofshift = $form[ 'timeofshift' ];
  $fever = $form[ 'Q1fever' ];
  $coughcolds = $form[ 'Q2CandC' ];
  $bodypains = $form[ 'Q3Bpains' ];
  $sorethroat = $form[ 'Q4Sorethroat' ];
  $question5 = $form[ 'Q5f2f' ];
  $question6 = $form[ 'Q6directcare' ];
  $question7 = $form[ 'Q7travelledPH' ];
  $question8 = $form[ 'Q8travelledBin' ];
  $currentaddress = $form[ 'currentaddress' ];
  $travelledaddress = $form[ 'areatravelled' ];
  
  $stmt->execute();
  
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>