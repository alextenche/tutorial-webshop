<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="eCommerce tutorial">
	<meta name="keywords" content="HTML,CSS,PHP,MySQL,ecommerce">
	<meta name="author" content="Alex Tenche">
	<title>eCommerce</title>
	<link href="css/core.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<a href="/eCommerce/" class="navbar-brand"> eCommerce admin cms </a>
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
			</div><!-- end col-md-4 left -->


			<div class="col-md-8" id="right">


<div id="header">
	<div id="header_in">
		<h5><a href="/admin/?page=products"> admin cms </a></h5>
		<?php
			if (Login::isLogged(Login::$_login_admin)) {
				echo '<div id="logged_as">Logged in as: <strong>';
				echo Login::getFullNameFront(Session::getSession(Login::$_login_admin));
				echo '</strong> | <a href="/ecommerce/admin/?page=logout">Logout</a></div>';
			} else {
				echo '<div id="logged_as"><a href="/admin/">Login</a></div>';
			}
		?>
	</div>
</div>
<div id="outer">
	<div id="wrapper">
		<div id="left">
			<?php if (Login::isLogged(Login::$_login_admin)) { ?>
			<h2>Navigation</h2>
			<div class="dev br_td">&nbsp;</div>
			<ul id="navigation">
				<li>
					<a href="/ecommerce/admin/?page=products"
					<?php echo Helper::getActive(
						array('page' => 'products')
					); ?>>
					products
					</a>
				</li>
				<li>
					<a href="/ecommerce/admin/?page=categories"
					<?php echo Helper::getActive(
						array('page' => 'categories')
					); ?>>
					categories
					</a>
				</li>
				<li>
					<a href="/ecommerce/admin/?page=orders"
					<?php echo Helper::getActive(
						array('page' => 'orders')
					); ?>>
					orders
					</a>
				</li>
				<li>
					<a href="/ecommerce/admin/?page=clients"
					<?php echo Helper::getActive(
						array('page' => 'clients')
					); ?>>
					clients
					</a>
				</li>
				<li>
					<a href="/ecommerce/admin/?page=business"
					<?php echo Helper::getActive(
						array('page' => 'business')
					); ?>>
					business
					</a>
				</li>
			</ul>
			<?php } else { ?>
				&nbsp;
			<?php } ?>
		</div>
		<div id="right">
