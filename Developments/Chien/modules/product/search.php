<?php

include 'db/connect.php';
$searchErr = '';
$employee_details='';
if(isset($_POST['save']))
{
	if(!empty($_POST['search']))
	{
		$search = $_POST['search'];
		$stmt = $con->prepare("select * from book where book_name like '%$search%' or author like '%$search%'");
		$stmt->execute();
		$book_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
	}
	else
	{
		$searchErr = "Please enter the information";
	}
   
}

?>

