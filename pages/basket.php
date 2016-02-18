<?php
$session = Session::getSession('basket');

$objBasket = new Basket();

$out = array();

if(!empty($session)) {
	$objCatalogue = new Catalogue();
	foreach($session as $key =>$value){
		$out[$key] =  $objCatalogue->getProduct($key);
	}
}

require_once('_header.php'); ?>

<div class="panel panel-default">

	<div class="panel-heading panel-heading-green">
		<h3 class="panel-title"> your basket </h3>
	</div>

	<div class="panel-body">

		<?php if(!empty($out)) { ?>

			<div id="big_basket">

				<form action="" method="post" id="frm_basket">
					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped tbl_repeat">
						<tr>
							<th> item </th>
							<th class="ta_r"> qty </th>
							<th class="ta_r col_15"> price </th>
							<th class="ta_r col_15"> remove </th>
						</tr>

						<?php foreach($out as $item) : ?>
							<tr>
								<td><?php echo Helper::encodeHTML($item['name']); ?></td>
								<td><input type="text" name="qty-<?php echo $item['id']; ?>" id="qty-<?php echo $item['id']; ?>"
									class="fld_qty" value="<?php echo $session[$item['id']]['qty']; ?>"/></td>
								<td class="ta_r"><?php echo Catalogue::$_currency; ?>
									<?php echo number_format($objBasket->itemTotal($item['price'], $session[$item['id']]['qty']), 2); ?></td>
								<td class="ta_r"><?php echo Basket::removeButton($item['id']); ?></td>
							</tr>
						<?php endforeach; ?>

						<?php if($objBasket->_vat_rate != 0) : ?>
							<tr>
								<td colspan="2" class="br_td" > sub-total: </td>
								<td class="ta_r br_td"><?php echo Catalogue::$_currency; ?><?php echo number_format($objBasket->_sub_total, 2); ?></td>
								<td class="ta_r br_td">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" class="br_td" > tva(<?php echo $objBasket->_vat_rate; ?>%): </td>
								<td class="ta_r br_td"><?php echo Catalogue::$_currency; ?><?php echo number_format($objBasket->_vat, 2); ?></td>
								<td class="ta_r br_td">&#160;</td>
							</tr>
						<?php endif; ?>

						<tr>
							<td colspan="2" class="br_td" ><strong> totla: </strong></td>
							<td class="ta_r br_td"><strong><?php echo Catalogue::$_currency; ?><?php echo number_format($objBasket->_total, 2); ?></strong></td>
							<td class="ta_r br_td">&#160;</td>
						</tr>
					</table>

					<div class="dev br_td">&nbsp;</div>

					<div class="btn btn-default sbm sbm_blue fl_r">
						<a href="?page=checkout" class="btn"> checkout </a>
					</div>

					<div class="btn btn-default sbm sbm_blue fl_l update_basket">
						<span class="btn"> update </span>
					</div>

				</form>
			</div><!-- end big-basket -->

		<?php } else { ?>

			<p> your basket is currently empty </p>

		<?php } ?>

	</div><!-- end panel-body -->

</div><!--end panel panel-default -->

<?php require_once('_footer.php'); ?>
