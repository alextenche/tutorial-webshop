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
	<link href="css/custom.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<div class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<a href="/eCommerce/" class="navbar-brand"><?php echo $business['name']; ?></a>
			</div>

			<?php if (Login::isLogged(Login::$_login_front)) : ?>
				<div class="navbar-right">
					<p id="logged_as" class="navbar-text">Logged in as <strong>
						<?php echo Login::getFullNameFront(Session::getSession(Login::$_login_front)); ?>
					</strong></p>
					<a href="?page=orders"><button type="button" class="btn btn-default navbar-btn">My orders</button></a>
					<a href="?page=logout"><button type="button" class="btn btn-default navbar-btn">Logout</button></a>
				</div>
			<?php else : ?>
				<div class="navbar-right">
					<a href="?page=login"><button type="button" id="logged_as" class="btn btn-default navbar-btn">Login</button></a>
				</div>
			<?php endif; ?>

		</div><!-- end container -->
	</div><!-- end navbar navbar-default -->


<div class="container">
	<div class="row">

		<div class="col-md-4" id="left">

			<?php require_once('basket_left.php'); ?>

			<div class="panel panel-default panel-list">
				<div class="panel-heading panel-heading-dark">
					<h3 class="panel-title">Categories</h3>
				</div>

				<!-- List categories -->
				<ul class="list-group" id="navigation">

					<?php // missing an if there a no categories !
					foreach($cats as $cat) :
						echo "<li class='list-group-item'><a href=\"?page=catalogue&amp;category=".$cat['id']."\"";
						echo Helper::getActive(array('category' => $cat['id']));
						echo ">";
						echo Helper::encodeHtml($cat['name']);
						echo "</a></li>";
					endforeach; ?>

				</ul>
			</div>

		</div><!-- end col-md-4 left -->


		<div class="col-md-8" id="right">
