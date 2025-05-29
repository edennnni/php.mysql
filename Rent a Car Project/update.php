<?php 

	include_once('config.php');
	


	if (isset($_POST['submit1'])) {
		$id = $_POST['id'];
		$tesla_name = $_POST['tesla_name'];
		$tesla_name = $_POST['tesla_name'];
		$tesla_quality= $_POST['tesla_quality'];
		  $tesla_rating=$_POST['tesla_rating'];
		

		$sql = "UPDATE tesla SET id=:id,  tesla_name=:moto_tesla, tesla_desc=:tesla_desc, tesla_quality=:tesla_quality,tesla_rating=tesla_rating=:tesla_rating WHERE id=:id";

		$prep = $conn->prepare($sql);
		$prep->bindParam(':id',$id);
		$prep->bindParam(':tesla_name',$tesla_name);
		$prep->bindParam(':tesla_desc',$tesla_desc);
		$prep->bindParam(':tesla_quality',$tesla_quality);      
		$prep->bindParam(':tesla_rating',$tesla_rating);
		
		$prep->execute();
		header("Location: dashboard.php");
	}
 ?>