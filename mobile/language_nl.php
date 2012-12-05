<?php

$_['Products'] = "Producten";
$_['Featured Products'] = "Uitgelichte producten";
$_['oops'] = "Oeps";
$_['Gallery'] = "Gallery";
$_['Total'] = "Totaal";
$_['Go'] = "Go";
$_['Sorry the page you visited does not exist'] = "De pagina die wilde bezoeken bestaat helaas niet";
$_['Cart'] = $_['cart'] = "Winkelwagentje";
$_['name'] = "Naam";
$_['price']= "Prijs";
$_['delete'] = "Verwijderen";
$_['Qty'] = $_['qty'] = "Aantal";
$_['Thank You! We Appreciate your Business!'] = "Dank u! We stellen uw klandizie zeer op prijs!";
$_['OsCommerce'] = "OsCommerce";
$_['cookies'] = "Cookies zijn op dit moment niet ingeschakeld in uw browser. Cookies zijn nodig om op deze website te kunnen winkelen. 
In de browser van uw telefoon vindt u een voorkeursinstelling waarmee u cookies desgewenst opnieuw kunt inschakelen.";
$_['You can click here once you have enabled them again to start shopping.'] = 'U kunt <a href="./">click here</a> zodra u hebt ingeschakeld ze weer om te winkelen.';
$_['Done'] = "Gereed";
$_['Home'] = "Home";
$_['Your search has produced no results'] = "Uw zoekopdracht heeft geen resultaten opgeleverd";
$_['Categories'] = "Rubrieken";
$_['Search'] = "Zoeken";
$_['Cookies are not enabled'] = "Cookies zijn niet ingeschakeld";
$_['Results'] = "Resultaten";
$_['More info...'] = "Meer informatie...";
$_['click here'] = "klik hier";
$_['once you have enabled them again to start shopping.'] = "Zodra u de cookies weer heeft ingeschakeld, kunt u met winkelen beginnen.";
$_['Your cart is empty'] = "Uw winkelwagentje is leeg";
$_['Shopping Cart'] = "Winkelwagentje";
$_['Edit...'] = "Bewerken...";
$_['Product'] = "Product";
$_['OR'] = "OF";
$_['Continue Shopping'] = "Doorgaan met winkelen";
$_['clear text'] = "tekst wissen";
$_['Return to Desktop site']  = "Terug naar website voor desktopcomputers";
$_['Search Results'] = "Zoekresultaten";
$_['Add to Cart'] = "Toevoegen aan winkelwagentje";
$_['Update Cart'] = "Winkelwagentje bijwerken";
$_['Edit Cart'] = "Winkelwagentje bewerken";
$_['There is no description for this product'] = 'Er is geen beschrijving voor dit product';
$_['You have x items in your cart the total is y'] = 'U heeft <span class="itemcount">{count}</span> object(en) in uw winkelwagentje. Het totaalbedrag is: <span class="total">{total}</span>';
$_['Your order number is x'] = "Uw bestelnummer is: {order}";

foreach($_ as $k => $v){

	$_[$k] =  iconv("ISO-8859-1//TRANSLIT",CHARSET, $v);

}

