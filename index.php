<?php @ob_start();
session_start();

include('includes/config.php');
echo "<center><h1>Inventory Management</h1></center>";
if(isset($_POST['submit'])){

	$username = $_POST['username'];
	$password = $_POST['password'];
	$result = mysql_query("SELECT * FROM `login` WHERE `username` = '$username' AND `password` = md5('$password')");
	//md5 for decryption//

	//$result1 = mysql_query('SELECT username,password  FROM login WHERE username= " '  . $_POST['username' ]. ' " AND password = " ' .md5($_POST['password']). ' ');
if($row=mysql_fetch_array($result))
{
         echo  "Welcome : ".$row['username'];
		 $count = mysql_num_rows($result);

	//if ($count == '1') 
			
	//	if ($row = mysql_fetch_assoc($result)) 
		    
		    header('Location: adminhome.php');}
		
 else
 {
		$result2=mysql_query("SELECT * FROM `login` WHERE username='".$username."'");
		if($row=mysql_fetch_array($result2))
		{
			 
			 echo "<center><h3>Password Mismatch</h3></center>";
			 //echo"</html>";
			 //echo "<h5>Password Mismatch</h5>";
		}
		else
		{
		
		$result1="INSERT INTO `login`(`username`, `password`) VALUES ('".$username."','".md5($password)." ')";
		$p=mysql_query($result1);
		echo "<center><h3>Account created login now</h3></center>";
			}
 }
}


 
?>

<!DOCTYPE html>
<html>
<head>
<title>InventoryManagement</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords"
	content="BOX SHOP Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link
	href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic'
	rel='stylesheet' type='text/css'>
<link
	href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
	rel='stylesheet' type='text/css'>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css"
	media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- start slider -->
<script src="js/responsiveslides.min.js"></script>
<script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
<!--end slider -->
<link rel="stylesheet" href="css/flexslider.css" type="text/css"
	media="screen" />
<script type="text/javascript">
			$(window).load(function() {
				$("#flexiselDemo").flexisel({
					visibleItems: 5,
					animationSpeed: 1000,
					autoPlay: true,
					autoPlaySpeed: 3000,    		
					pauseOnHover: true,
					enableResponsiveBreakpoints: true,
			    	responsiveBreakpoints: { 
			    		portrait: { 
			    			changePoint:480,
			    			visibleItems: 1
			    		}, 
			    		landscape: { 
			    			changePoint:640,
			    			visibleItems: 2
			    		},
			    		tablet: { 
			    			changePoint:768,
			    			visibleItems: 3
			    		}
			    	}
			    });
			    
			});
		</script>
<script type="text/javascript" src="js/jquery.flexisel.js"></script>
</head>
<body>
	<br/><br/>
	<div class="wrap">
		<div class="navigation-strip">
			<a href="index.php"><img src="images/logo.png" class="img-responsive"
				alt="" style="display: inline-block; padding: 0 0; margin: 0 0;" />
			</a>
			<div class="top-menu">
				<!-- start header menu -->
				<ul class="megamenu skyblue">
					<li><a class="color1" href="index.php">home</a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>


		<!-- start account -->
		<div class="login-page">
			<div class="dreamcrub">
				<div class="account_grid">
					<div class="col-md-12 login-right">
						<h3>LOGIN</h3>
						<p>If you have an account with us, please log in.</p>
						<form method="post" class="form form-vertical" id="register-form"
							method="post" onSubmit="loadVal();">

							<span style="color: red;"> <?php echo isset($emsg)?$emsg:'';?> </span>

							<h3 style="color: #3498db;">
							<?php echo isset($pmsg)?$pmsg:'';?>
							</h3>

							<div>
								<span>User Name</span> <input type="text" name="username"
									id="username" required>
							</div>
							<div>
								<span>Password</span> <input type="password" name="password"
									id="password" required>
							</div>
							<input
								type="submit" name="submit" value="Login">
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