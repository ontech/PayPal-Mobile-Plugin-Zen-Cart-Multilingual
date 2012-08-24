<?php
$_['Products'] = "Produits";
$_['Featured Products'] = "Top produits";
$_['oops'] = "Oops";
$_['Total'] = "Total";
$_['Sorry the page you visited does not exist'] = "Sorry the page you visited doesn't exist";
$_['Cart'] = $_['cart'] = "Panier";
$_['name'] = "Nom";
$_['price']= "Prix";
$_['delete'] = "Delete";
$_['qty'] = "Quantité";
$_['Thank You! We Appreciate your Business!'] = "Nous vous remercions de votre confiance. Détails de votre commande";
$_['OsCommerce'] = "OsCommerce";
$_['cookies'] = "Sorry, cookies are currently not enabled in your browser, cookies are necessary to shop 
on this site, you will be able to find a preference in your phone's browser to re-enable them again 
if you wish to do so.";
$_['You can click here once you have enabled them again to start shopping.'] = 'You can <a href="./">click here</a>once you have enabled them again to start shopping.';
$_['Done'] = "Done";
$_['Home'] = "Accueil";
$_['Your search has produced no results'] = "Aucun résultat trouvé";
$_['Categories'] = "Catégories";
$_['Search'] = "Recherche";
$_['Cookies are not enabled'] = "Cookies are not enabled";
$_['Results'] = "Résultats";
$_['More info...'] = "Plus d'infos";
$_['click here'] = "click here";
$_['once you have enabled them again to start shopping.'] = "once you have enabled them again to start shopping.";
$_['Qty'] = "Qty";
$_['Your cart is empty'] = "Votre panier est vide";
$_['Shopping Cart'] = "Panier";
$_['Edit...'] = "Modifier";
$_['Product'] = "Product";
$_['OR'] = "OU";
$_['Continue Shopping'] = "Continuer vos achats";
$_['clear text'] = "clear text";
$_['Return to Desktop site']  = "Revenir à la version web";
$_['Search Results'] = "Recherche Résultats"; //?
$_['Add to Cart'] = "Ajouter au panier";
$_['Update Cart'] = "Mettre à jour le panier";
$_['Edit Cart'] = "Modifier le panier";
$_['There is no description for this product'] = 'There is no description for this product';
$_['You have x items in your cart the total is y'] = 'Votre panier contient <span class="itemcount">{count}</span> article(s).<br/>Total: <span class="total">{total}</span>';
$_['Your order number is x'] = "Votre numéro de commande :";
foreach($_ as $k => $v){
	$_[$k] =  iconv("ISO-8859-1//TRANSLIT","UTF-8", $v);
}
