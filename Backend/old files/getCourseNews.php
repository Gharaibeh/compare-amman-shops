<?php



 $servername = "localhost";
$username = "user1";
$password = "";
$dbname = "saridb_qa";

 
// Create connection
 
$conn = mysqli_connect($servername, $username, $password, $dbname);

 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

  $result = $conn->query("SELECT * FROM advertisement");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Course":"'  . $rs["subjectUsername"] . '",';
    $outp .= '"News":"'   . $rs["News"]        . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);

  

    


?>