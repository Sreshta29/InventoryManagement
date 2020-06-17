<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<?php

if(isset($_POST['submit'])){

	$pid= $_POST['pid'];
	$description= $_POST['description'];
	$sdate = date('Y-m-d H:i:s');

	$usql ="INSERT INTO `services`(pid,description,sdate) VALUES ('$pid','$description','$sdate')";
	
	$result = mysql_query($usql);

	$smsg = "Service info Added Successfully";
}

?>
<!-- stProduct account -->
<div class="login-page">
	<div class="dreamcrub">
		<div class="account_grid">
			<div class="col-md-6 login-right">
				<h3>Add Service Info</h3>
				
				<form method="post" class="form form-vertical" id="test-form" method="post" onSubmit="loadVal();">
					
					<?php 
					   $pid =isset($_GET['pid'])?$_GET['pid']:'';
					?>
					
					<input type="hidden" value="<?php echo $pid; ?>" name="pid">
					
					<span style="color: green;"> <?php echo isset($smsg)?$smsg:'';?> </span>
					
					<div>
						<span>description</span> <input type="text" name="description"
							id="description" required
							<?php echo isset($_POST['description'])?$_POST['description']:'';?>>
					</div>

					<input type="submit" name="submit" value="Add Service">
					
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
