<?php require('language_fr.php'); ?>
<div style="padding: 10px;"><?php 
		$arr = array(
			"{count}" => $_SESSION['cart']->count_contents(),
			"{total}" => $currencies->format($_SESSION['cart']->show_total())
		);
		echo str_replace(array_keys($arr),array_values($arr), $_['You have x items in your cart the total is y']); 
	?></div>
