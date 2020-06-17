<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<?php

require_once ('includes/Pagination.class.php');

$pid = isset($_GET['pid']) ? $_GET['pid'] : '';
$sqli="SELECT * FROM products where pid='$pid' ";
$sql = "SELECT * FROM  services where pid='$pid' ";
$resulti = mysql_query($sqli);

$result = mysql_query($sql);

?>
<div id="page-wrapper">

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">

				<div class="panel-heading">
					<strong> Product Info </strong>
				</div>

				<!-- /.panel-heading -->
				<div class="panel-body">

					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover"
							id="dataTables-example">
							<thead>
								<tr>
									
									<td width="10%">PID</td>
									<td width="10%">Name</td>
									<td width="10%">Price</td>
									<td width="10%">Manufacture name</td>
									<td width="10%">Description</td>
									<td width="10%">Type</td>
									<td width="10%">Image</td>
									<td width="10%">Date</td>
									<td width="10%">Delete</td>

								</tr>
							</thead>
							<tbody>

							<?php
                                    while ($row = mysql_fetch_assoc($resulti)) {
                            ?>

								<tr>
									
									<td><?php echo $row ['pid']; ?></td>
									<td><?php echo $row ['name']; ?></td>
									<td><?php echo $row ['price']; ?></td>
									<td><?php echo $row ['mname']; ?></td>
									<td><?php echo $row ['description']; ?></td>
									<td><?php echo $row ['type']; ?></td>
									<td><?php echo $row ['product_image']; ?></td>
									<td><?php echo $row ['pdate']; ?></td>
									<td><a href="deleteproduct.php?pid=<?php echo $row ['pid']; ?>" />Delete</a></td>
								</tr>
								<?php
                                    }
                                ?>
							</tbody>
						</table>
					</div>
					<!-- /.table-responsive -->

				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
	</div>

</div>







<div id="page-wrapper">

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">

				<div class="panel-heading">
					<strong> Service Info </strong>
				</div>

				<!-- /.panel-heading -->
				<div class="panel-body">

					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover"
							id="dataTables-example">
							<thead>
								<tr>
									<td width="10%">SID</td>
									<td width="10%">PID</td>
									<td width="10%">Description</td>
									<td width="10%">Date</td>
									<td width="10%">Delete</td>

								</tr>
							</thead>
							<tbody>

							<?php
                                    while ($row = mysql_fetch_assoc($result)) {
                            ?>

								<tr>
									<td><?php echo $row ['id']; ?></td>
									<td><?php echo $row ['pid']; ?></td>
									<td><?php echo $row ['description']; ?></td>
									<td><?php echo $row ['sdate']; ?></td>
									<td><a href="deleteservice.php?sid=<?php echo $row ['id']; ?>" />Delete</a></td>
								</tr>
								<?php
                                    }
                                ?>
							</tbody>
						</table>
					</div>
					<!-- /.table-responsive -->

				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
	</div>

</div>

</div>

</div>
</div>




