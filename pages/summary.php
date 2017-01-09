<?php

Login::restrictFront();

$token1 = mt_rand();
$token2 = Login::stringToHash($token1);
Session::setSession('token2', $token2);

$objBasket = new Basket();

$out = array();

$session = Session::getSession('basket');

if ( !empty($session) ) {
	$objCatalogue = new Catalogue();
	foreach( $session as $key => $value ) {
		$out[$key] = $objCatalogue->getProduct($key);
	}
}

require_once("_header.php");?>

<?php if (!empty($out)) { ?>

<div class="panel panel-default" id="big_basket">

	<div class="panel-heading panel-heading-green">
		<h3 class="panel-title"> Order summary </h3>
	</div>

	<div class="panel-body">

		<form action="" method="post" id="frm_basket">

			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped tbl_repeat">

				<tr>
					<th>Item</th>
					<th class="ta_r">Qty</th>
					<th class="ta_r col_15">Price</th>
				</tr>

				<?php foreach($out as $item) { ?>
					<tr>
						<td><?php echo $item['name']; ?></td>
						<td class="ta_r"><?php echo $session[$item['id']]['qty']; ?></td>
						<td class="ta_r">&pound;<?php echo number_format($objBasket->itemTotal($item['price'], $session[$item['id']]['qty']), 2); ?></td>
					</tr>				
				<?php } ?>

				<?php if ($objBasket->_vat_rate > 0) { ?>

					<tr>
						<td colspan="2" class="br_td">
							Sub-total:
						</td>
						<td class="ta_r br_td">
							&pound;<?php echo number_format($objBasket->_sub_total, 2); ?>
						</td>
					</tr>

					<tr>
						<td colspan="2" class="br_td">
							VAT (<?php echo $objBasket->_vat_rate; ?>%)
						</td>
						<td class="ta_r br_td">
							&pound;<?php echo number_format($objBasket->_vat, 2); ?>
						</td>
					</tr>

				<?php } ?>

				<tr>
					<td colspan="2" class="br_td">
						<strong>Total:</strong>
					</td>
					<td class="ta_r br_td">
						<strong>&pound;<?php echo number_format($objBasket->_total, 2); ?></strong>
					</td>
				</tr>

			</table><!-- end table -->

			<hr>

			<div class="btn btn-default sbm sbm_blue fl_r paypal" id="<?php echo $token1; ?>">
				<span> Proceed to PayPal </span>
			</div>

			<br><br>
		
			<div class="btn btn-default sbm sbm_blue fl_l">
				<a href="?page=basket"> Amend order </a>
			</div>
		
		</form>
	
		<div class="dev">&#160;</div>
	
	</div><!-- end panel-body -->

</div><!-- end panel -->

<div class="dn">
	<img src="images/loadinfo.net.gif" alt="Proceeding to PayPal" />
</div>

<?php } else { ?>

<p>Your basket is currently empty.</p>

<?php } ?>


<?php
require_once("_footer.php");