<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<?php

if(isset($_POST['submit'])){

	$tid= $_POST['tid'];
	$status= $_POST['status'];

	$usql ="update transactions set status='$status' where tid='$tid'";
	
	$result = mysql_query($usql);

	$smsg = "Status Updated";
}

?>

<!-- start account -->
<div class="login-page">
	<div class="dreamcrub">
		<div class="account_grid">
			<div class="col-md-6 login-right">
				<h3>Update Status </h3>
				
				<form method="post" class="form form-vertical" id="test-form"
					method="post" onSubmit="loadVal();">
					
					<?php 
						
						$tid= $_GET['tid'];
					?>
					<span style="color: red;"> <?php echo isset($emsg)?$emsg:'';?> </span>

					<span style="color: green;"> <?php echo isset($smsg)?$smsg:'';?> </span>
					
					<input type="hidden" value="<?php echo $tid; ?>" name="tid">
					
					<div>
						<span>status</span> <input type="text" name="status"
							id="status" required >
					</div>

					<input type="submit" name="submit" value="Add status">

				</form>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
</div>
</div>
</div>
							<?php include('includes/footer.php'); ?>
