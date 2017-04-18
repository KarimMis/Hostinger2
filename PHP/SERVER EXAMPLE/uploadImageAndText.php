
<?php
$servername = "127.0.0.1";
$dbusername = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $dbusername, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



        if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$photo = $_POST['photo'];
         $photoName = $_POST['photoName'];
		 $photoAge = $_POST['photoAge'];
		
	
		
		$sql ="SELECT id FROM data ORDER BY id ASC";
		
		$res = mysqli_query($conn,$sql);
		
		$id = 0;
		
		while($row = mysqli_fetch_array($res)){
				$id = $row['id'];
		}
		
		$path = "uploads/$id.png";
		
		$actualpath = "http://192.168.1.4/VolleyUploadImagAndMultiText/$path";
		
		$sql = "INSERT INTO data (photo,photoName,photoAge) VALUES ('$actualpath','$photoName','$photoAge')";
			
		if(mysqli_query($conn,$sql)){
			file_put_contents($path,base64_decode($photo));
			echo "Successfully Uploaded Data to server";
		}
		
		
	else{
		echo "Error";
	}
}


 


$conn->close();
?>