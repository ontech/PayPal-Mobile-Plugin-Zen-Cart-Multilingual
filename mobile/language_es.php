<?php

$_['Products'] = "Productos";
$_['Featured Products'] = "Productos destacados";
$_['oops'] = "Error";
$_['Gallery'] = "Galer�a";
$_['Total'] = "Total";
$_['Go'] = "Ir";
$_['Sorry the page you visited does not exist'] = "La p�gina que ha visitado no existe.";
$_['Cart'] = $_['cart'] = "Carro";
$_['name'] = "Nombre";
$_['price']= "Precio";
$_['delete'] = "Eliminar";
$_['Qty'] = $_['qty'] = "Cant.";
$_['Thank You! We Appreciate your Business!'] = "�Gracias! Valoramos que utilice nuestro servicio.";
$_['OsCommerce'] = "OsCommerce";
$_['cookies'] = "El navegador no tiene activadas las cookies, que son necesarias para comprar en este sitio web; si lo desea, encontrar� una preferencia en el navegador del tel�fono para volver a activarlas. Una vez activadas de nuevo, puede empezar a comprar.";
$_['You can click here once you have enabled them again to start shopping.'] = 'Usted puede <a href="./">click here</a>una vez que se les ha permitido volver a empezar a comprar.';
$_['Done'] = "Hecho";
$_['Home'] = "Inicio";
$_['Your search has produced no results'] = "La b�squeda no produjo resultados.";
$_['Categories'] = "Categor�as";
$_['Search'] = "Buscar";
$_['Cookies are not enabled'] = "Las cookies no est�n activadas.";
$_['Results'] = "Resultados";
$_['More info...'] = "M�s informaci�n�";
$_['click here'] = "haga clic aqu�";
$_['once you have enabled them again to start shopping.'] = "Una vez activadas de nuevo, puede empezar a comprar.";
$_['Your cart is empty'] = "El carro est� vac�o.";
$_['Shopping Cart'] = "Carro de la compra";
$_['Edit...'] = "Modificar�";
$_['Product'] = "Producto";
$_['OR'] = "O";
$_['Continue Shopping'] = "Continuar compra";
$_['clear text'] = "borrar texto";
$_['Return to Desktop site']  = "Volver al sitio del escritorio";
$_['Search Results'] = "Resultados de la b�squeda";
$_['Add to Cart'] = "A�adir al carro";
$_['Update Cart'] = "Actualizar carro";
$_['Edit Cart'] = "Modificar carro";
$_['There is no description for this product'] = 'No hay ninguna descripci�n de este producto';
$_['You have x items in your cart the total is y'] = 'Art�culos en el carro: <span class="itemcount">{count}</span>.<br/>Total:<span class="total">{total}</span>';
$_['Your order number is x'] = "El n�mero de su pedido es: {order}";

foreach($_ as $k => $v){

	$_[$k] =  iconv("ISO-8859-1//TRANSLIT",CHARSET, $v);

}

