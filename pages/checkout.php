<?php

Login::restrictFront();

$objUser = new User();
$user = $objUser->getUser(Session::getSession(Login::$_login_front));

if(!empty($user)) {

	$objForm = new Form();
	$objValid = new Validation($objForm);

	if($objForm->isPost('first_name')){

		$objValid->_expected = array('first_name', 'last_name', 'address_1', 'address_2', 'town', 'county', 'post_code', 'country', 'email');
		$objValid->_required = array('first_name', 'last_name', 'address_1', 'town', 'county', 'post_code', 'country', 'email');
		$objValid->_special = array('email' => 'email');

		if( $objValid->isValid() ){
			if( $objUser->updateUser($objValid->_post, $user['id']) ){
				Helper::redirect('?page=summary');    // !!!!!!!!!
			} else {
				$mess  = "<p class=\"red\">There was a problem updating your details.<br />";
				$mess .= "Please contact administrator.</p>";
			}
		}

	}

	require_once('_header.php'); ?>

	<div class="panel panel-default">

		<div class="panel-heading panel-heading-green">
			<h1 class="panel-title">Checkout</h1>
		</div>

		<div class="panel-body">
			<br>

			<p> please check your details and click <strong> next </strong>. </p>

			<?php echo !empty($mess) ? $mess : null; ?>

			<form action="" method="post">
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped tbl_insert">

					<tr>
						<th><label for="first_name">First name</label></th>
						<td>
							<?php echo $objValid->validate('first_name');?>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input type="text" class="form-control fld" name="first_name" id="first_name"
									value="<?php echo $objForm->stickyText('first_name', $user['first_name']);?>">
							</div>
						</td>
					</tr>

					<tr>
						<th><label for="last_name">Last name</label></th>
						<td>
							<?php echo $objValid->validate('last_name');?>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input type="text" name="last_name" id="last_name" class="form-control fld"
									value="<?php echo $objForm->stickyText('last_name', $user['last_name']);?>" />
							</div>
						</td>
					</tr>

					<tr>
						<th><label for="adress_1">Address</label></th>
						<td>
							<?php echo $objValid->validate('address_1');?>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
								<input type="text" name="address_1" id="adress_1" class="form-control fld"
									value="<?php echo $objForm->stickyText('address_1', $user['address_1']);?>" />
							</div>
						</td>
					</tr>

					<tr>
						<th><label for="adress_2">Second Address</label></th>
						<td>
							<div class="input-group">
								<?php echo $objValid->validate('address_2');?>
								<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
								<input type="text" name="address_2" id="address_2" class="form-control fld"
									value="<?php echo $objForm->stickyText('address_2', $user['address_2']);?>" />
							</div>
						</td>
					</tr>

					<tr>
						<th><label for="town">Town</label></th>
						<td>
							<div class="input-group">
								<?php echo $objValid->validate('town');?>
								<span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
								<input type="text" name="town" id="town" class="form-control fld"
									value="<?php echo $objForm->stickyText('town', $user['town']);?>" />
							</div>
						</td>
					</tr>

					<tr>
						<th><label for="county">County</label></th>
						<td>
							<?php echo $objValid->validate('county');?>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
								<input type="text" name="county" id="county" class="form-control fld"
									value="<?php echo $objForm->stickyText('county', $user['county']);?>" />
							</div>
						</td>
					</tr>

					<tr>
						<th><label for="post_code">Post code</label></th>
						<td>
							<?php echo $objValid->validate('post_code');?>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
								<input type="text" name="post_code" id="post_code" class="form-control fld"
									value="<?php echo $objForm->stickyText('post_code', $user['post_code']);?>" />
							</div>
						</td>
					</tr>

					<tr>
						<th><label for="country">Country</label></th>
						<td>
							<?php echo $objValid->validate('country'); ?>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
								<?php echo $objForm->getCountriesSelect($user['country']); ?>
							</div>
						</td>
					</tr>

					<tr>
						<th><label for="email">Email address</label></th>
						<td>
							<?php echo $objValid->validate('email');?>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
								<input type="text" name="email" id="email" class="form-control fld"
									value="<?php echo $objForm->stickyText('email', $user['email']);?>" />
							</div>
						</td>
					</tr>

					<tr>
						<th>&nbsp;</th>
						<td>
							<br>
							<input type="submit" name="submit" id="btn" value="Next" class="btn btn-primary">
						</td>
					</tr>

				</table><!-- end table -->

			</form><!-- end form -->

	</div><!-- end panel-body -->

</div><!-- end panel panel-default -->

<?php
	require_once('_footer.php');
} else {
	Helper::redirect('page=error');
}
