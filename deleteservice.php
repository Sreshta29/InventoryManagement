<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<?php
	
	$id =isset($_GET['sid'])?$_GET['sid']:'';

	$psql ="DELETE FROM `services` WHERE id='$id'";
	$result = mysql_query($psql);
	
	header('Location: viewproducts.php');
	exit; 

?>