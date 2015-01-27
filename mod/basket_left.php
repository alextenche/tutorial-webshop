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



<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Your Basket</div>

  <!-- Table -->
  <table class="table">

    <tbody id="basket_left">
          <tr>
            
            <td>No. of items:</td>
            <td class="bl_ti"><span><?php echo $objBasket->_number_of_items; ?></span></td>
          
          </tr>
          <tr>
            
            <td>Sub-total:</td>
            <td class="bl_st"><?php echo Catalogue::$_currency; ?><span><?php echo number_format($objBasket->_sub_total, 2); ?></span></td>
          
          </tr>
          <tr>
            
            <td>TVA (<span><?php echo $objBasket->_vat_rate; ?></span>%):</td>
            <td><?php echo Catalogue::$_currency; ?><span><?php echo number_format($objBasket->_vat, 2); ?></span></td>
          
          </tr>
          <tr>
            
            <td>Total (inc):</td>
            <td><span><?php echo $objBasket->_number_of_items; ?></span></td>
          
          </tr>
        </tbody>
  
  
  </table>
</div>


<div class="cart-block" style="background: #333;
  color: #fff;
  padding: 10px;
  margin-bottom: 20px;
  border-radius:5px;">
          <form action="cart/update" method="post">
            <table cellpadding="6" cellspacing="1" style="width:100%" border="0">
              <tr>
                <td>No. of items:</td>
                <td class="bl_ti"><span><?php echo $objBasket->_number_of_items; ?></span></td>
              </tr>
              <tr>
                <td>Sub-total:</td>
                <td class="bl_st"><?php echo Catalogue::$_currency; ?><span><?php echo number_format($objBasket->_sub_total, 2); ?></span></td>
              </tr>
              <tr>
                <td>TVA (<span><?php echo $objBasket->_vat_rate; ?></span>%):</td>
                <td><?php echo Catalogue::$_currency; ?><span><?php echo number_format($objBasket->_vat, 2); ?></span></td>
              </tr>
              <tr>
                <td>Total (inc):</td>
            <td><span><?php echo $objBasket->_number_of_items; ?></span></td>
              </tr>
            </table>
            <br>
            <p><button class="btn btn-default" type="submit">Update Cart</button>
            <a class="btn btn-default" href="cart">Go To Cart</a></p>
          </form>
        </div>