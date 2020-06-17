<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<?php

include ('phpqrcode/qrlib.php');

if(isset($_POST['submit'])){

	$type= $_POST['type'];
	$name= $_POST['name'];
	$mname= $_POST['mname'];
	$description= $_POST['description'];
	$price= $_POST['price'];

	$pdate = date('Y-m-d H:i:s');

	$target_path = "productimages/";
    $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
	$product_image=basename( $_FILES['uploadedfile']['name']);
	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path))
	
	$usql ="INSERT INTO `products`(name,price,mname,description,type,product_image,pdate) VALUES ('$name','$price','$mname','$description','$type','$product_image','$pdate')";
	mysql_query($usql);
	
	$res = mysql_query("SELECT MAX(pid) AS max_id FROM products");
	$row = mysql_fetch_array($res);
	$id=$row["max_id"];
	
	echo $id;
	
	QRcode::png("http://localhost/InventoryManagement/viewservices.php?pid=".$id,"./qrimages/".$id.".jpg");

	$smsg = "Product Uploaded Successfully";
}

?>
<!-- stProduct account -->
<div class="login-page">
	<div class="dreamcrub">
		<div class="account_grid">
			<div class="col-md-6 login-right">
				<h3>Add Product</h3>
				<form method="post" class="form form-vertical" id="test-form"
					method="post" onSubmit="loadVal();" enctype="multipart/form-data">

					<span style="color: red;"> <?php echo isset($emsg)?$emsg:'';?> </span>

					<span style="color: green;"> <?php echo isset($smsg)?$smsg:'';?> </span>
					
					<div>
						<span>Name</span> <input type="text" name="name"
							id="name" required
							<?php echo isset($_POST['name'])?$_POST['name']:'';?>>
					</div>
					
					<div>
						<span>Price</span> <input type="text" name="price"
							id="price" required
							<?php echo isset($_POST['price'])?$_POST['price']:'';?>>
					</div>


					<div>
						<span>Manufacture Name:</span> <input type="text" name="mname"
							id="mname">
							
					</div>

					<div>
						<span>description</span> <input type="text" name="description"
							id="description" required
							<?php echo isset($_POST['description'])?$_POST['description']:'';?>>
					</div>

					<div>
						<span>Type</span> <input type="text" name="type"
							id="type" required
							<?php echo isset($_POST['type'])?$_POST['type']:'';?>>
					</div>

					<div>
					<span>Upload Image</span>
						<input  type="file" name="uploadedfile" id="uploadedfile"  required>
				   
				   	</div>

					<input type="submit" name="submit" value="Add Product">
					
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
