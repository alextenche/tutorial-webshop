<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="eCommerce tutorial">
	<meta name="keywords" content="HTML,CSS,PHP,MySQL,ecommerce">
	<meta name="author" content="Alex Tenche">
	<title>eCommerce</title>
	<link href="css/core.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">
	<div id="header_in">
		<h5><a href="/admin/?page=products">Content Management System</a></h5>
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