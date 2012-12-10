<?php

$_['Products'] = "Prodotti";
$_['Featured Products'] = "Top Prodotti";
$_['oops'] = "Oops";
$_['Gallery'] = "Gallery";
$_['Total'] = "Totale";
$_['Go'] = "Go";
$_['Sorry the page you visited does not exist'] = "Spiacenti, la pagina che hai visitato non esiste";
$_['Cart'] = $_['cart'] = "Carrello";
$_['name'] = "Nome";
$_['price']= "Prezzo";
$_['delete'] = "Elimina";
$_['Qty'] = $_['qty'] = "Quantità";
$_['Thank You! We Appreciate your Business!'] = "Grazie! Apprezziamo il vostro commercio!";
$_['OsCommerce'] = "OsCommerce";
$_['cookies'] = "Spiacenti, i cookie non sono attualmente abilitati nel tuo browser, i cookie sono tenuti ad acquistare da questo sito, si sarà in grado di trovare una preferenza nel browser del tuo cellulare per riattivare nuovamente se si desidera";
$_['You can click here once you have enabled them again to start shopping.'] = 'Che puoi <a href="./">click here</a>una volta che si hanno permesso loro di nuovo per iniziare a fare acquisti.';
$_['Done'] = "Fatto";
$_['Home'] = "Home";
$_['Your search has produced no results'] = "La tua ricerca non ha prodotto risultati";
$_['Categories'] = "Categorie";
$_['Search'] = "Cerca";
$_['Cookies are not enabled'] = "les cookies ne sont pas actuellement activé";
$_['Results'] = "Risultati";
$_['More info...'] = "Per saperne di più...";
$_['click here'] = "Clicca qui";
$_['once you have enabled them again to start shopping.'] = "una volta che si hanno permesso loro di nuovo per iniziare lo shopping.";
$_['Your cart is empty'] = "Il tuo carrello è vuoto";
$_['Shopping Cart'] = "Carrello";
$_['Edit...'] = "Modifica...";
$_['Product'] = "Prodotto";
$_['OR'] = "OPPURE";
$_['Continue Shopping'] = "Continua lo shopping";
$_['clear text'] = "cancella testo";
$_['Return to Desktop site']  = "Torna al sito Desktop";
$_['Search Results'] = "Risultati di ricerca";
$_['Add to Cart'] = "Aggiungi al carrello";
$_['Update Cart'] = "Aggiorna carrello";
$_['Edit Cart'] = "Modifica carrello";
$_['There is no description for this product'] = 'Non c\'è una descrizione per questo prodotto';
$_['You have x items in your cart the total is y'] = 'Il tuo carrello ha <span class="itemcount">{count}</span> article(s).<br/>Total: <span class="total">{total}</span>';
$_['Your order number is x'] = "Il tuo numero d'ordine è: {order}";

foreach($_ as $k => $v){

	$_[$k] =  iconv("ISO-8859-1//TRANSLIT",CHARSET, $v);

}

