<?php	

	include_once('config.php');

	if(isset($_POST['submit']))
	{
		$tesla_name = $_POST['tesla_name'];
		$tesla_desc = $_POST['tesla_desc'];
		$tesla_quality = $_POST['tesla_quality'];
		$tesla_rating = $_POST['tesla_rating'];
		$tesla_image = $_POST['tesla_image'];

		$sql = "INSERT INTO tesla(tesla_name, tesla_desc, tesla_quality, tesla_rating, tesla_image) 
				VALUES (:tesla_name, :tesla_desc, :tesla_quality, :tesla_rating, :tesla_image)";

		$insertTesla = $conn->prepare($sql);

		$insertTesla->bindParam(':tesla_name', $tesla_name);
		$insertTesla->bindParam(':tesla_desc', $tesla_desc);
		$insertTesla->bindParam(':tesla_quality', $tesla_quality);
		$insertTesla->bindParam(':tesla_rating', $tesla_rating);
		$insertTesla->bindParam(':tesla_image', $tesla_image);

		$insertTesla->execute();

		header("Location: dashboard.php");
	}
?>
