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

  $result = $conn->query("SELECT * FROM studentsmarks");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
     if ($outp != "") {$outp .= ",";}
    $outp .= '{"StuNo":"'  . $rs["studentNo"] . '",';
    $outp .= '"FirstEx":"'  . $rs["firstExam"] . '",';
    $outp .= '"SecondEx":"'  . $rs["secondExam"] . '",';
    $outp .= '"FinalEx":"'  . $rs["finalExam"] . '",';
    $outp .= '"StuNotes":"'   . $rs["notes"]        . '"}';
}
$outp ='{"Marks":['.$outp.']}';
$conn->close();

echo($outp);

  

    


?>