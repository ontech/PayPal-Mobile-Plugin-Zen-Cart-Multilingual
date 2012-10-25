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
$_['Qty'] = $_['qty'] = "Quantité";
$_['Thank You! We Appreciate your Business!'] = "Nous vous remercions de votre confiance. Détails de votre commande";
$_['OsCommerce'] = "OsCommerce";
$_['cookies'] = "Désolé, les cookies ne sont pas actuellement activé sur votre navigateur, les cookies sont nécessaires pour acheter sur ce site, vous serez en mesure de trouver une préférence dans le navigateur de votre téléphone pour les réactiver à nouveau si vous le souhaitez";
$_['You can click here once you have enabled them again to start shopping.'] = 'Vous pouvez <a href="./">cliquer ici</a> une fois que vous les avez réactiver pour continuer vos achats..';
$_['Done'] = "Fait";
$_['Home'] = "Accueil";
$_['Your search has produced no results'] = "Aucun résultat trouvé";
$_['Categories'] = "Catégories";
$_['Search'] = "Recherche";
$_['Cookies are not enabled'] = "les cookies ne sont pas actuellement activé";
$_['Results'] = "Résultats";
$_['More info...'] = "Plus d'infos";
$_['click here'] = "Cliquer ici";
$_['once you have enabled them again to start shopping.'] = "une fois que vous les avez réactiver pour continuer vos achats.";
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
$_['Your order number is x'] = "Votre numéro de commande: {order}";
foreach($_ as $k => $v){
	$_[$k] =  iconv("ISO-8859-1//TRANSLIT",CHARSET, $v);
}
