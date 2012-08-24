<?php include 'header.php'; ?>

<div>
	<?php   for ($i=0;$i<sizeof($breadcrumb->_trail);$i++) { ?>
	<?php 
	$str = end(explode('_', $breadcrumb->_trail[$i]['link']));	
	$catid = preg_replace('[\D]', '', $str);
	?>
	<a href="<?php 
		if($i==0) {
			echo './">';
		} else {
			echo 'category' . $catid . '_1.htm?cPath='. $catid . '">';
		};
		echo htmlspecialchars($breadcrumb->_trail[$i]['title']); ?></a> >
	<?php } ?>
</div>

<?php
$subcategories = zen_get_categories('', $current_category_id);

?>

<ul data-role="listview" data-inset="true" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
	<?php   for ($i=0;$i<sizeof($subcategories);$i++) { ?>
		<li data-theme="c" class=""><a data-transition="slide" href="category<?php echo $subcategories[$i]['id'] ?>_1.htm?cPath=<?php echo $current_category_id ?>_<?php echo $subcategories[$i]['id'] ?>"><?php echo $subcategories[$i]['text']; ?></a></li>
	<?php } ?>
</ul>


<?php

$listing_split = new splitPageResults($listing_sql, MAX_DISPLAY_PRODUCTS_LISTING, 'p.products_id', 'page');
$listing = $db->Execute($listing_split->sql_query);

if (!$listing->EOF) {
?>
<ul data-role="listview" data-inset="true" id="products" class="products" style="margin-top: 8px;">
	<li data-role="list-divider">Products</li>

	<?php
	while(!$listing->EOF)
	{
	?>
		
	<li style="text-align:center; padding:5px;" class="ui-body-c">
	
<div class="hproduct brief" style="text-align:center;">

<table width="100%">
<tr>
	<td colspan="2" align="left">
		<a rel="external" href="prod<?php echo $listing->fields['products_id']; ?>.htm?products_id=<?php echo $listing->fields['products_id']; ?>"><?php echo htmlspecialchars($listing->fields['products_name']); ?></a>
	</td>
</tr>
<tr>
<td width="0" style="vertical-align: top;">
	<a href="prod<?php echo $listing->fields['products_id']; ?>.htm?products_id=<?php echo $listing->fields['products_id']; ?>"><img class="photo" style="margin-top:3px; margin-left:auto; margin-right:auto;" src="<?php echo htmlspecialchars(mobile_image(DIR_WS_IMAGES.$listing->fields['products_image'])); ?>" width="100"/></a>
</td>
<td align="left">

		<form method="post" action="cart/index.php?action=add_product" class="productform">
                        <input type="hidden" name="securityToken" value="<?php echo @$_SESSION['securityToken'];?>" />
<!--			<input type="hidden" name="products_id" value="<?php echo $listing->fields['products_id']; ?>"/>
			<input type="hidden" name="cart_quantity" value="1" maxlength="6" size="4"> -->

<!--bof Add to Cart Box -->
<?php
if (CUSTOMERS_APPROVAL != 3 and TEXT_LOGIN_FOR_PRICE_BUTTON_REPLACE_SHOWROOM != '') {
	$flag_show_product_info_in_cart_qty = zen_get_show_product_switch($listing->fields['products_id'], 'in_cart_qty');
    $display_qty = (($flag_show_product_info_in_cart_qty == 1 and $_SESSION['cart']->in_cart($listing->fields['products_id'])) ? '<p>' . PRODUCTS_ORDER_QTY_TEXT_IN_CART . $_SESSION['cart']->get_quantity($listing->fields['products_id']) . '</p>' : '');

			$products_qty_box_status = $listing->fields['products_qty_box_status'];
			$products_quantity_order_max = $listing->fields['products_quantity_order_max'];
            if ($products_qty_box_status == 0 or $products_quantity_order_max== 1) {
              // hide the quantity box and default to 1
              $the_button = '<input type="hidden" name="cart_quantity" value="1" />' . zen_draw_hidden_field('products_id', $listing->fields['products_id']);
            } else {
              // show the quantity box
    $the_button = '<input type="text" name="cart_quantity" value="' . (zen_get_buy_now_qty($listing->fields['products_id'])) . '" maxlength="6" size="4" /><br />' . zen_draw_hidden_field('products_id', $listing->fields['products_id']); // . zen_image_submit(BUTTON_IMAGE_IN_CART, BUTTON_IN_CART_ALT);
            }
    $display_button = zen_get_buy_now_button($listing->fields['products_id'], $the_button);
  ?>
  <?php if ($display_qty != '' or $display_button != '') { ?>
    <?php
      echo $display_qty;
      //echo $display_button;
            ?>
  <?php } // display qty and button ?>
<?php } // CUSTOMERS_APPROVAL == 3 ?>
<!--eof Add to Cart Box-->

			<table align="center" style="margin-left:auto; margin-right:auto;" width="100"><tr><td style="border:none; vertical-align:middle">					
					<span class="price">
						<?php echo zen_get_products_display_price($listing->fields['products_id']) ?>
					</span>
				
			</td></tr><tr><td style="border:none; vertical-align:middle;">

			<?php
			if (zen_has_product_attributes($listing->fields['products_id'])) { 
				echo ' ';
			} else {
				if (CUSTOMERS_APPROVAL == 3 and TEXT_LOGIN_FOR_PRICE_BUTTON_REPLACE_SHOWROOM == '') {
				  // do nothing
				} else {
					if ($display_button !='') {
					echo $display_button;
					?><input type="submit" class="buy" data-theme="e" value="<?php echo $_['Add to Cart'] ?>" /><br/><?php
					}
				} 
			}
			?>
				<a href="prod<?php echo $listing->fields['products_id']; ?>.htm?products_id=<?php echo $listing->fields['products_id']; ?>" class="ui-link" style="color: #2489CE !important; text-shadow: none;"><?php echo $_['More info...'] ?></a>
			</td></tr></table>
		</form>

</td>
</tr>
</table>		
</div>
	
	</li>
	
	<?php

		$listing->MoveNext();
	}
} else if(!$subcategories) {

echo '<p>There are no products in this category</p>';

};
?>

</ul>

<?php include 'returntodesktop.php' ?>


<?php include 'footer.php'; ?>

