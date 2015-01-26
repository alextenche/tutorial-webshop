<?php 
	$objCatalogue = new Catalogue();
	$cats = $objCatalogue->getCategories();

	$objBusiness = new Business();
	$business = $objBusiness->getBusiness();
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="eCommerce tutorial">
	<meta name="keywords" content="HTML,CSS,PHP,MySQL,ecommerce">
	<meta name="author" content="Alex Tenche">
	<title>eCommerce</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<!--<link href="css/core.css" rel="stylesheet" type="text/css" />-->
	<style type="text/css">
	#navigation li {
		list-style: none;
		margin-left: 0;
	}
	#navigation{
		margin-left: 0;
		padding: 0;
	}
	</style>
</head>

<body>


	<div class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<a href="/" class="navbar-brand"><?php echo $business['name']; ?></a>
			</div>

			<div class="collapse navbar-collapse">
				<form class="navbar-form navbar-right">
					<div class="form-group">
						<input type="email" class="form-control" placeholder="Email">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-success">Log In</button>
				</form>
			</div>

		</div>
	</div>



	<!--<div id="header">
	<div id="header_in">
		<h5><a href="/"><?php echo $business['name']; ?></a></h5>
		<?php
			/*if (Login::isLogged(Login::$_login_front)) {
				echo '<div id="logged_as">Logged in as: <strong>';
				echo Login::getFullNameFront(Session::getSession(Login::$_login_front));
				echo '</strong> | <a href="?page=orders">My orders</a>';
				echo ' | <a href="?page=logout">Logout</a></div>';				
			} else {
				echo '<div id="logged_as"><a href="?page=login">Login</a></div>';
			}*/
		?>
	</div>
	</div>-->

<div class="container">
	<div class="row">
		<div class="col-md-4" id="left">
			<?php require_once('basket_left.php'); ?>

			<?php if (!empty($cats)) : ?>
				<h2>Categories</h2>
				<ul id="navigation">
				<?php foreach($cats as $cat) :
					echo "<li><a href=\"?page=catalogue&amp;category=".$cat['id']."\"";
					echo Helper::getActive(array('category' => $cat['id']));
					echo ">";
					echo Helper::encodeHtml($cat['name']);
					echo "</a></li>";
				endforeach; ?>
				</ul>
			<?php endif; ?>					
		</div>


		<div class="col-md-8" id="right">