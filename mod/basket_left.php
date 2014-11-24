<?php $objBasket = new Basket(); ?>
<h2>Your Basket</h2>
<dl id="basket_left">
	<dt>No. of items:</dt>
	<dd class="bl_ti"><span><?php echo $objBasket->_number_of_items; ?></span></dd>
	<dt>Sub-total:</dt>
	<dd class="bl_st"><?php echo Catalogue::$_currency; ?><span><?php echo number_format($objBasket->_sub_total, 2); ?></span></dd>
	<dt>TVA (<span><?php echo $objBasket->_vat_rate; ?></span>%):</dt>
	<dd class="bl_vat"><?php echo Catalogue::$_currency; ?><span><?php echo number_format($objBasket->_vat, 2); ?></span></dd>
	<dt>Total (inc):</dt>
	<dd class="bl_total"><?php echo Catalogue::$_currency; ?><span><?php echo number_format($objBasket->_total, 2); ?></span></dd>
</dl>
<div class="dev br_td">&#160;</div>
<p><a href="?page=basket">View Basket</a> | <a href="?page=checkout">Checkout</a></p>
<div class="dev br_td">&#160;</div>