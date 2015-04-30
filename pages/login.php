<?php

if ( Login::isLogged(Login::$_login_front) ) {
	Helper::redirect(Login::$_dashboard_front);
}


$objForm = new Form();
$objValid = new Validation($objForm);
$objUser = new User();

// login form
if( $objForm->isPost('login_email') ){
	if( $objUser->isUser( $objForm->getPost('login_email'),
						  $objForm->getPost('login_password')) ){
		Login::loginFront($objUser->_id, Url::getReferrerUrl());
	} else {
		$objValid->add2Errors('login');
	}
}


// registration form
if($objForm->isPost('first_name')) {

	$objValid->_expected = array('first_name', 'last_name', 'address_1', 'address_2', 'town', 'county', 'post_code',
	 							 'country', 'email', 'password', 'confirm_password');
	$objValid->_required = array('first_name', 'last_name', 'address_1', 'town', 'county', 'post_code', 'country', 
								 'email', 'password', 'confirm_password');	
	$objValid->_special = array('email' => 'email');
	$objValid->_post_remove = array('confirm_password');	
	$objValid->_post_format = array('password' => 'password');
	
	// validate password
	$pass_1 = $objForm->getPost('password');
	$pass_2 = $objForm->getPost('confirm_password');
	
	if (!empty($pass_1) && !empty($pass_2) && $pass_1 != $pass_2) {
		$objValid->add2Errors('password_mismatch');
	}
	
	// the user identified with the email
	$email = $objForm->getPost('email');
	$user = $objUser->getByEmail($email);
	
	if (!empty($user)) {
		$objValid->add2Errors('email_duplicate');
	}
	
	
	if ($objValid->isValid()) {
		
		// add hash for activating account
		$objValid->_post['hash'] = mt_rand().date('YmdHis').mt_rand();
		
		// add registration date
		$objValid->_post['date'] = Helper::setDate();
		
		
		if ($objUser->addUser($objValid->_post, $objForm->getPost('password'))) {
			Helper::redirect('?page=registered');
		} else {
			Helper::redirect('?page=registered-failed');
		}	
	}
	
	
}

require_once('_header.php'); ?>

<div class="panel panel-default">

	<div class="panel-heading panel-heading-green">
		<h1 class="panel-title">Login</h1>
	</div>

	<div class="panel-body">

		<form role="form" action="" method="POST">
			<fieldset>
				<br>
				<div class="row">
					<div class="col-sm-12 col-md-10  col-md-offset-1 ">
						<div class="form-group">
							<?php echo $objValid->validate('login'); ?>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> 
								<input class="form-control fld" id="login_email" placeholder="Username" name="login_email" type="text" value="">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input class="form-control fld" id="login_password" placeholder="Password" name="login_password" type="password" value="">
							</div>
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary" id="btn_login" value="Log in">
						</div>
					</div>
				</div>
			</fieldset>
		</form><!-- end login form -->

	</div><!-- end panel-body -->

</div><!-- end panel panel-default -->

<hr>
<!--<div class="dev br_td">&#160;</div>-->

<div class="panel panel-default">

	<div class="panel-heading panel-heading-green">
		<h3 class="panel-title">Not registred yet ?</h3>
	</div>

	<div class="panel-body">

		<form role="form" action="" method="post">
			<div class="row">
				<div class="col-sm-12 col-md-10  col-md-offset-1 ">

					<div class="form-group">
						<?php echo $objValid->validate('first_name'); ?>
						<label for="first_name">First name</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" class="form-control fld" name="first_name" id="first_name" placeholder="first name"
								 value="<?php echo $objForm->stickyText('first_name'); ?>">
						</div>
					</div>

					<div class="form-group">
						<?php echo $objValid->validate('last_name');?>
						<label for="last_name">Last name</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> 
							<input class="form-control fld" id="last_name" name="last_name" type="text" placeholder="second name" 
								value="<?php echo $objForm->stickyText('last_name'); ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="address_1">Address 1</label>
						<?php echo $objValid->validate('address_1');?>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
							<input type="text" class="form-control fld" id="address_1" name="address_1" placeholder="first address"
								value="<?php echo $objForm->stickyText('address_1'); ?>" >
						</div>
					</div>

					<div class="form-group">
						<label for="address_2">Address 2:</label>
						<?php echo $objValid->validate('address_2'); ?>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
							<input type="text" class="form-control fld" id="address_2" name="address_2" placeholder="second address - optional" 
								value="<?php echo $objForm->stickyText('address_2'); ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="town">Town</label>
						<?php echo $objValid->validate('town'); ?>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
							<input type="text" class="form-control fld" id="town" name="town" placeholder="town"
							 	value="<?php echo $objForm->stickyText('town'); ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="county">County</label>
						<?php echo $objValid->validate('county'); ?>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
							<input type="text" class="form-control fld" id="county" name="county" placeholder="county" 
								value="<?php echo $objForm->stickyText('county'); ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="post_code">Post Code</label>
						<?php echo $objValid->validate('post_code'); ?>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
							<input type="text" class="form-control fld" id="post_code" name="post_code" placeholder="post code from your area"
							 	value="<?php echo $objForm->stickyText('post_code'); ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="country">Country</label>
						<?php echo $objValid->validate('country'); ?>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
							<?php echo $objForm->getCountriesSelect(); // 229 - UK ?>
						</div>
					</div>

					<div class="form-group">
						<label for="email">Email address</label>
						<?php echo $objValid->validate('email');?>
        				<?php echo $objValid->validate('email_duplicate');?>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
							<input type="text" class="form-control fld" id="email" name="email" placeholder="your email address"
							 	value="<?php echo $objForm->stickyText('email'); ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="password">Password </label>
						<?php echo $objValid->validate('password');?>
        				<?php echo $objValid->validate('password_mismatch');?>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input type="password" class="form-control fld" id="password" name="password" placeholder="your password"
							 	value="">
						</div>
					</div>

					<div class="form-group">
						<label for="confirm_password">Confirm password</label>
						<?php echo $objValid->validate('confirm_password');?>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input type="password" class="form-control fld" id="confirm_password" name="confirm_password" placeholder="your password"
							 	value="">
						</div>
					</div>

					<input type="submit" name="submit" id="btn" value="Register" class="btn btn-primary">

					<br>

				</div>
			</div>
		</form>


        <!--<div class="col-lg-5 col-md-push-1">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <strong><span class="glyphicon glyphicon-ok"></span> Success! Message sent.</strong>
                </div>
                <div class="alert alert-danger">
                    <span class="glyphicon glyphicon-remove"></span><strong> Error! Please check all page inputs.</strong>
                </div>
            </div>
        </div>-->


</div><!-- end panel-body -->
</div><!-- end panel panel-default -->

<?php require_once('_footer.php');