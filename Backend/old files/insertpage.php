 <?php
 

$servername = "localhost";
$username = "user1";
$password = "";
$dbname = "saridb_qa";

 
$subjectName= $_REQUEST['subjectName'];
$studentNumber= $_REQUEST['studentNumber'];

$firstMark = $_REQUEST['firstMark'];
$secondMark= $_REQUEST['secondMark'];
$finalMark= $_REQUEST['finalMark'];
$stuNote = $_REQUEST['stuNote'];

//Create connection
 
$conn = mysqli_connect($servername, $username, $password, $dbname);
 
 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 // $sql = "SELECT * FROM advertisement";

$sql = "SELECT * FROM studentsmarks WHERE studentNo = '$studentNumber' AND subjectUsername= '$subjectName'";
$result = mysqli_query($conn, $sql);
//  $result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		   $sql = "UPDATE studentsmarks SET 
           firstExam = '$firstMark' ,  
           secondExam =  '$secondMark', 
           finalExam = '$finalMark',
           notes = '$stuNote' 
           WHERE studentNo= '$studentNumber' AND subjectUsername= '$subjectName'";
 
	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
		
		 
		 
    } else {
		echo "Error updating record: " . $conn->error;
	}

    }
} else {
   $sql = "INSERT INTO studentsmarks (subjectUsername, studentNo, firstExam , secondExam , finalExam , notes)
VALUES('$subjectName' , '$studentNumber' , '$firstMark' , '$secondMark' , '$finalMark' , '$stuNote')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}


  
 ?>