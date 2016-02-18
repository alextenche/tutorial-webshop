<?php $objBasket = new Basket(); ?>

<div class="cart-block" style="background: #333;color: #fff;padding: 10px;margin-bottom: 20px;border-radius:5px;">
  <form action="cart/update" method="post">
    <table cellpadding="6" cellspacing="1" style="width:100%" border="0" id="basket_left">
      <tr>
        <td> no. of items: </td>
        <td class="bl_ti"><span><?php echo $objBasket->_number_of_items; ?></span></td>
      </tr>
      <tr>
        <td> sub-total: </td>
        <td class="bl_st"><?php echo Catalogue::$_currency; ?><span><?php echo number_format($objBasket->_sub_total, 2); ?></span></td>
      </tr>
      <tr>
        <td> tva (<span><?php echo $objBasket->_vat_rate; ?></span>%):</td>
        <td class="bl_vat"><?php echo Catalogue::$_currency; ?><span><?php echo number_format($objBasket->_vat, 2); ?></span></td>
      </tr>
      <tr>
        <td> total: </td>
        <td class="bl_total"><?php echo Catalogue::$_currency; ?><span><?php echo number_format($objBasket->_total, 2); ?></span></td>
      </tr>
    </table>
    <br>
    <p>
      <a class="btn btn-default" href="?page=basket"> view basket </a>
      <a class="btn btn-default" href="?page=checkout"> checkout </a>
    </p>
  </form>
</div>
