<?php include 'header.php'; ?>

<h1><?php echo $_['cart']; ?></h1>
<?php echo zen_draw_form('cart_quantity', zen_href_link(FILENAME_SHOPPING_CART, 'action=update_product', 'NONSSL')); ?>

<?php

	$cartempty = $_SESSION['cart']->count_contents();
	
	if ($cartempty == 0) {
	
	echo '<p>' . $_['Your cart is empty'] . '</p>';
	
	} else {

?>

<table cellpadding="4" style="width: 100%;" id="cart">
<tr>
	<th style="border-right:0px !important;"><?php echo $_['qty']; ?></th>
	<th style="border-left:0px !important;"> &nbsp;</th>
	<th><?php echo $_['name']; ?></th>
	<th><?php echo $_['price']; ?></th>
	<th><?php echo $_['delete']; ?></th>
</tr>
<?php
  foreach ($productArray as $product) {
?>
<tbody style="border-bottom:2px solid #ccc;">
<tr>
	<td>
		<?php
		  if ($product['flagShowFixedQuantity']) {
			echo $product['showFixedQuantityAmount'] . '<span class="alert bold">' . $product['flagStockCheck'] . '</span>' . $product['showMinUnits'];
		  } else {
			echo $product['quantityField'] . '<span class="alert bold">' . $product['flagStockCheck'] . '</span>' . $product['showMinUnits'];
		  }
		?>
	</td>
	<td class="update">
	<?php
		if ($product['buttonUpdate'] == '') {
		echo '' ;
		} else {
		echo $product['buttonUpdate'];
		}
	?>
	</td>
	<td><?php echo htmlspecialchars($product['productsName']); ?> </td>
	<td><?php echo $product['productsPrice']; ?> </td>
	<td align="center">
           <a href="index.php?main_page=shopping_cart&action=remove_product&product_id=<?php echo $product['id']; ?>"><img src="mobile/images/delete.png" /></a>
	</td>
</tr>
<tr>
	<td colspan="5">
		<?php
		  echo $product['attributeHiddenField'];
		  if (isset($product['attributes']) && is_array($product['attributes'])) {
		  echo '<ul style="margin:0px;" padding:0px;">';
			reset($product['attributes']);
			foreach ($product['attributes'] as $option => $value) {
		?>

		<li><?php echo htmlspecialchars($value['products_options_name']) . TEXT_OPTION_DIVIDER . nl2br(htmlspecialchars($value['products_options_values_name'])); ?></li>

		<?php
			}
		  echo '</ul>';
		  }
		?>
	</td>
</tr>
</tbody>
<?php
}
?>
<tr>
	<td colspan="3" align="right" style="font-weight: bolder;"><?php echo $_['Total'] ?> (<?php echo $_SESSION['currency']; ?>)</td>
	<td style="font-weight: bolder;"><?php echo $cartShowTotal; ?> </td>
</tr>
<tr>
<td colspan="5" style="text-align:center;">
<input type="submit" value="<?php echo $_['Update Cart'] ?>">
</td>
</tr>
</table>

<div style="text-align:center; padding-top:10px;">
	<a rel="external" href="./ipn_main_handler.php?type=ec">
		    <img id="paypalbutton" src="<?php echo $_SESSION['PaypalLanguages']['checkoutWithPaypal'] ?>" />
		    <img style="display:none;" src="<?php echo $_SESSION['PaypalLanguages']['checkoutWithPaypal'] ?>" />
    </a>
</div>

<?php
	}
?>

</form>

<?php include 'returntodesktop.php' ?>

<?php include 'footer.php'; ?>
