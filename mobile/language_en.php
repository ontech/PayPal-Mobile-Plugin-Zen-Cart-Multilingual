<?php

$_['Products'] = "Products";
$_['Featured Products'] = "Featured Products";
$_['oops'] = "Oops";
$_['Gallery'] = "Gallery";
$_['Total'] = "Total";
$_['Go'] = "Go";
$_['Sorry the page you visited does not exist'] = "Sorry the page you visited doesn't exist";
$_['Cart'] = $_['cart'] = "Cart";
$_['name'] = "Name";
$_['price']= "Price";
$_['delete'] = "Delete";
$_['Qty'] = $_['qty'] = "Qty";
$_['Thank You! We Appreciate your Business!'] = "Thank You! We Appreciate your Business!";
$_['OsCommerce'] = "OsCommerce";
$_['cookies'] = "Sorry, cookies are currently not enabled in your browser, cookies are necessary to shop on this site, you will be able to find a preference in your phone's browser to re-enable them again if you wish to do so.";
$_['You can click here once you have enabled them again to start shopping.'] = 'You can <a href="./">click here</a> once you have enabled them again to start shopping.';
$_['Done'] = "Done";
$_['Home'] = "Home";
$_['Your search has produced no results'] = "Your search has produced no results";
$_['Categories'] = "Categories";
$_['Search'] = "Search";
$_['Cookies are not enabled'] = "Cookies are not enabled";
$_['Results'] = "Results";
$_['More info...'] = "More info...";
$_['click here'] = "click here";
$_['once you have enabled them again to start shopping.'] = "once you have enabled them again to start shopping.";
$_['Your cart is empty'] = "Your cart is empty";
$_['Shopping Cart'] = "Shopping Cart";
$_['Edit...'] = "Edit...";
$_['Product'] = "Product";
$_['OR'] = "OR";
$_['Continue Shopping'] = "Continue Shopping";
$_['clear text'] = "clear text";
$_['Return to Desktop site']  = "Return to Desktop site";
$_['Search Results'] = "Search Results";
$_['Add to Cart'] = "Add to Cart";
$_['Update Cart'] = "Update Cart";
$_['Edit Cart'] = "Edit Cart";
$_['There is no description for this product'] = 'There is no description for this product';
$_['You have x items in your cart the total is y'] = 'You have <span class="itemcount">{count}</span> item(s).<br/>Total: <span class="total">{total}</span>';
$_['Your order number is x'] = "Your order number is: {order}";

foreach($_ as $k => $v){

	$_[$k] =  iconv("ISO-8859-1//TRANSLIT","UTF-8", $v);

}

