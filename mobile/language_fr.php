<?php
$_['Products'] = "Produits";
$_['Featured Products'] = "Top produits";
$_['oops'] = "Oops";
$_['Gallery'] = "Galerie";
$_['Total'] = "Total";
$_['Go'] = "Go";
$_['Sorry the page you visited does not exist'] = "Sorry the page you visited doesn't exist";
$_['Cart'] = $_['cart'] = "Panier";
$_['name'] = "Nom";
$_['price']= "Prix";
$_['delete'] = "Supprimer";
$_['Qty'] = $_['qty'] = "Quantit�";
$_['Thank You! We Appreciate your Business!'] = "Nous vous remercions de votre confiance. D�tails de votre commande";
$_['OsCommerce'] = "OsCommerce";
$_['cookies'] = "D�sol�, les cookies ne sont pas actuellement activ� sur votre navigateur, les cookies sont n�cessaires pour acheter sur ce site, vous serez en mesure de trouver une pr�f�rence dans le navigateur de votre t�l�phone pour les r�activer � nouveau si vous le souhaitez";
$_['You can click here once you have enabled them again to start shopping.'] = 'Vous pouvez <a href="./">cliquer ici</a> une fois que vous les avez r�activer pour continuer vos achats..';
$_['Done'] = "Fait";
$_['Home'] = "Accueil";
$_['Your search has produced no results'] = "Aucun r�sultat trouv�";
$_['Categories'] = "Cat�gories";
$_['Search'] = "Recherche";
$_['Cookies are not enabled'] = "les cookies ne sont pas actuellement activ�";
$_['Results'] = "R�sultats";
$_['More info...'] = "Plus d'infos";
$_['click here'] = "Cliquer ici";
$_['once you have enabled them again to start shopping.'] = "une fois que vous les avez r�activer pour continuer vos achats.";
$_['Your cart is empty'] = "Votre panier est vide";
$_['Shopping Cart'] = "Panier";
$_['Edit...'] = "Modifier";
$_['Product'] = "Product";
$_['OR'] = "OU";
$_['Continue Shopping'] = "Continuer vos achats";
$_['clear text'] = "clear text";
$_['Return to Desktop site']  = "Revenir � la version web";
$_['Search Results'] = "Recherche R�sultats"; //?
$_['Add to Cart'] = "Ajouter au panier";
$_['Update Cart'] = "Mettre � jour le panier";
$_['Edit Cart'] = "Modifier le panier";
$_['There is no description for this product'] = 'There is no description for this product';
$_['You have x items in your cart the total is y'] = 'Votre panier contient <span class="itemcount">{count}</span> article(s).<br/>Total: <span class="total">{total}</span>';
$_['Your order number is x'] = "Votre num�ro de commande: {order}";
foreach($_ as $k => $v){
	$_[$k] =  iconv("ISO-8859-1//TRANSLIT",CHARSET, $v);
}
