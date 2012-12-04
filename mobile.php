<?php
        /* =============
         * CONFIGURATION
         * =============*/
        define("SHIPPING_SELECTOR", "on");
	define("IPN_HANDLER", "ipn_main_handler.php");
        $defaults = array(
		'languages_code' => 'fr',
		'language' => 'french',
		'languages_id' => 2
	);
        
         /* =============
         *  DEBUG
         *  =============*/
	ini_set('display_errors', 'off');
	error_reporting(0);
        
	function e(){

		if(strpos(func_get_arg(1), 'is_a()')===FALSE 
		&& strpos(func_get_arg(1), 'Constant')===FALSE
		&& strpos(func_get_arg(1), 'No such file or ')===FALSE)
		{ 
			echo "<script>console.log(";
			echo json_encode(array(func_get_arg(1),
				func_get_arg(2),
				func_get_arg(3)));
			echo ");</script>";
		}
		
	}
	//ini_set('display_errors', 'on');
	//error_reporting(E_ALL - E_NOTICE);
	//set_error_handler('e');
	//set_exception_handler('e');

	if(!defined('SKIP_SINGLE_PRODUCT_CATEGORIES')) define('SKIP_SINGLE_PRODUCT_CATEGORIES', 'False');
	require('includes/application_top.php');
	$_SESSION = array_merge($defaults, $_SESSION);		
	include("mobile/language_".$_SESSION['languages_code'] .".php");
	
	function get_paypalLanguages(){ 
		$l = array();
		$l['language'] = $_SESSION['languages_code'] . "_" . strtoupper($_SESSION['languages_code']);
		
		$l['checkoutWithPaypal'] = "mobile/images/" . $l['language'] . "/".$l['language'].".png";
		$l['checkoutWithPaypalDown'] = "mobile/images/" . $l['language'] . "/".$l['language']."_pressed.png";
		
		return $l;
	}
	$_SESSION['PaypalLanguages'] = get_paypalLanguages();
        $_SESSION['paypal_ec_markflow'] = 1;
        if(SHIPPING_SELECTOR=='on') 
        {
            $_SESSION['paypal_ec_markflow'] = 0;
            if($_GET['main_page']=='checkout_shipping' && $_POST) 
            {
                    $_SESSION['checkout_shipping_done'] = true;
            }
        }
        header("Content-Type: text/html; charset=" . CHARSET);
        
	if(isset($_GET["main_page"]) && $_GET["main_page"] == "login")
	{
		unset($_SESSION['paypal_ec_token']);
		header("HTTP/1.1 303 See Other");
		header("Location: http://".$_SERVER[HTTP_HOST]."/". DIR_WS_CATALOG ."/ipn_main_handler.php?type=ec");
	}  


	$language_page_directory = DIR_WS_LANGUAGES . $_SESSION['language'] . '/';
	$directory_array = $template->get_template_part($code_page_directory, '/^header_php/');

	foreach ($directory_array as $value) { 
	/**
	 * We now load header code for a given page. 
	 * Page code is stored in includes/modules/pages/PAGE_NAME/directory 
	 * 'header_php.php' files in that directory are loaded now.
	 */

			require($code_page_directory . '/' . $value);
	}

        /* Debugging
        $device = $_SERVER['template'];
        echo "this device is a $device";
        $pagename = 

        */

function matchhome(){
	global $db, $zco_notifier, $template;
 
	$requestURI = $_SERVER['REQUEST_URI']; 
	
	$catalogFolder = DIR_WS_CATALOG;
	$catalogFolder = preg_replace("/\/+$/", "", $catalogFolder);
	$subject = preg_replace("/".preg_quote($catalogFolder, "/")."/", "", $requestURI);
  
	$pattern = '/^\/(?:$|\?)/';
	preg_match($pattern, $subject, $matches);
	if ($matches) {
		return true;
	}
	
	return false;
}

if(matchhome())
{
	$select_column_list = 'pd.products_name, p.products_image, ';
	require('includes/index_filters/default_filter.php');
	include 'mobile/index.php';
	die();
}
function matchpayment() {

    $requestURI = $_SERVER['REQUEST_URI'];

    $catalogFolder = DIR_WS_CATALOG;
    $catalogFolder = preg_replace("/\\/$/", "", $catalogFolder);
    $subject = preg_replace("/" . preg_quote($catalogFolder, "/") . "/", "", $requestURI);

    $pattern = '/index.php\?main_page=checkout_payment/';
    preg_match($pattern, $subject, $matches);

    return (boolean) $matches;
}
if (matchpayment()) {
	
    if(isset($_SESSION['checkout_shipping_done']) && $_SESSION['checkout_shipping_done'])
    {
	
        unset($_SESSION['checkout_shipping_done']);
	 require_once(DIR_WS_MODULES . 'pages/checkout_payment/header_php.php');
         require($template->get_template_dir('main_template_vars.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/main_template_vars.php');
         

        header("Location: " . 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['SERVER_NAME'].str_replace("checkout_payment", "checkout_confirmation", $_SERVER['REQUEST_URI']) );
    }
    else 
    {
        unset($_SESSION['checkout_shipping_done']);
        header("Location: " . 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['SERVER_NAME'].str_replace("checkout_payment", "checkout_shipping", $_SERVER['REQUEST_URI']) );
    }
	die;
}
function matchconfirmation(){
    $requestURI = $_SERVER['REQUEST_URI'];

    $catalogFolder = DIR_WS_CATALOG;
    $catalogFolder = preg_replace("/\\/$/", "", $catalogFolder);
    $subject = preg_replace("/" . preg_quote($catalogFolder, "/") . "/", "", $requestURI);

    $pattern = '/index.php\?main_page=checkout_confirmation/';
    preg_match($pattern, $subject, $matches);

    return (boolean) $matches;
}
if(matchconfirmation())
{
	$_POST['payment'] = "paypalwpp";

    	require_once(DIR_WS_MODULES . 'pages/checkout_confirmation/header_php.php');      
	require($template->get_template_dir('main_template_vars.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/main_template_vars.php');
	header("Location: " . 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['SERVER_NAME'].str_replace("checkout_confirmation", "checkout_process", $_SERVER['REQUEST_URI']) );    
	die;
}
function matchshipping() {

    $requestURI = $_SERVER['REQUEST_URI'];

    $catalogFolder = DIR_WS_CATALOG;
    $catalogFolder = preg_replace("/\\/$/", "", $catalogFolder);
    $subject = preg_replace("/" . preg_quote($catalogFolder, "/") . "/", "", $requestURI);

    $pattern = '/index.php\?main_page=checkout_shipping/';
    preg_match($pattern, $subject, $matches);

    return (boolean) $matches;
}
if(matchshipping())
{
    if(SHIPPING_SELECTOR == "on")
    {
        
         require_once(DIR_WS_MODULES . 'pages/checkout_shipping/header_php.php');
         require($template->get_template_dir('main_template_vars.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/main_template_vars.php');
         include('mobile/checkoutshipping.php');
    }
    else
    	header("Location: " . 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['SERVER_NAME'].str_replace("checkout_payment", "checkout_process", $_SERVER['REQUEST_URI']) );
    die();
} 

function matchprocess() {

    $requestURI = $_SERVER['REQUEST_URI'];

    $catalogFolder = DIR_WS_CATALOG;
    $catalogFolder = preg_replace("/\\/$/", "", $catalogFolder);
    $subject = preg_replace("/" . preg_quote($catalogFolder, "/") . "/", "", $requestURI);

    $pattern = '/index.php\?main_page=checkout_process/';
    preg_match($pattern, $subject, $matches);

    return (boolean) $matches;
}
if(matchprocess())
{

    require_once(DIR_WS_MODULES . 'pages/checkout_process/header_php.php');
    require($template->get_template_dir('main_template_vars.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/main_template_vars.php');
    
   
    die();
} 

function matchcart(){
	global $productArray;
	global $cartShowTotal;
	global $currency_code;
	global $template;
  
	$requestURI = $_SERVER['REQUEST_URI']; 
	
	$catalogFolder = DIR_WS_CATALOG;
	$catalogFolder = preg_replace("/\\/$/", "", $catalogFolder);
	$subject = preg_replace("/".preg_quote($catalogFolder, "/")."/", "", $requestURI);  
  
	$pattern = '/index.php\?main_page=shopping_cart/';
	preg_match($pattern, $subject, $matches);
	
	return (boolean) $matches;
}
if(matchcart())
{
	include 'mobile/cart.php';
	die();
}	

function matchcheckoutsuccess(){
	global $zv_orders_id, $orders_id, $orders, $define_page, $template;

	$requestURI = $_SERVER['REQUEST_URI']; 
	
	$catalogFolder = DIR_WS_CATALOG;
	$catalogFolder = preg_replace("/\\/$/", "", $catalogFolder);
	$subject = preg_replace("/".preg_quote($catalogFolder, "/")."/", "", $requestURI);

	$pattern = '/index.php\?main_page=checkout_success/';
	preg_match($pattern, $subject, $matches);
	return (boolean) $matches;
}
if(matchcheckoutsuccess())
{
	include 'mobile/checkoutsuccess.php';
	die();
}



function matchminicart(){
	global $template, $currencies;
	
	$requestURI = $_SERVER['REQUEST_URI']; 
	
	$catalogFolder = DIR_WS_CATALOG;
	$catalogFolder = preg_replace("/\\/$/", "", $catalogFolder);
	$subject = preg_replace("/".preg_quote($catalogFolder, "/")."/", "", $requestURI);
  
	$pattern = '/minicart.php/';
	preg_match($pattern, $subject, $matches);
	return (boolean) $matches;
	
}
if (matchminicart()) {
		include 'mobile/minicart.php';
		die();
}

function matchminicartview(){
	global $template, $currencies;
	
	$requestURI = $_SERVER['REQUEST_URI']; 
	
	$catalogFolder = DIR_WS_CATALOG;
	$catalogFolder = preg_replace("/\\/$/", "", $catalogFolder);
	$subject = preg_replace("/".preg_quote($catalogFolder, "/")."/", "", $requestURI);

	$pattern = '/minicartview.php/';
	preg_match($pattern, $subject, $matches);
	return (boolean) $matches;
	if ($matches) {
		
	}
}
if(matchminicartview())
{
	include 'mobile/minicartview.php';
	die();
}

function matchcategory(){
	global $db, $zco_notifier, $template;
	
	$requestURI = $_SERVER['REQUEST_URI']; 
	
	$catalogFolder = DIR_WS_CATALOG;
	$catalogFolder = preg_replace("/\\/$/", "", $catalogFolder);
	$subject = preg_replace("/".preg_quote($catalogFolder, "/")."/", "", $requestURI);
  
	$pattern = '/^\/category\d+_\d+\.htm(?:$|\?)/';

	preg_match($pattern, $subject, $matches);
	return (boolean) $matches;

}
if(matchcategory())
{
	$select_column_list = 'pd.products_name, p.products_image, ';
	require('includes/index_filters/default_filter.php');
	include 'mobile/category.php';
	die();
}

function matchcookies() {
	global $template;

	$requestURI = $_SERVER['REQUEST_URI']; 
	
	$catalogFolder = DIR_WS_CATALOG;
	$catalogFolder = preg_replace("/\\/$/", "", $catalogFolder);
	$subject = preg_replace("/".preg_quote($catalogFolder, "/")."/", "", $requestURI);
  
	$pattern = '/cookies.php/';
	preg_match($pattern, $subject, $matches);
	return (boolean) $matches;
}
if(matchcookies())
{
	include 'mobile/cookies.php';
	die();
}


function matchproduct(){
	global $sql, $template;

  $requestURI = $_SERVER['REQUEST_URI']; 
 
  $catalogFolder = DIR_WS_CATALOG;
  $catalogFolder = preg_replace("/\\/$/", "", $catalogFolder);
  $subject = preg_replace("/".preg_quote($catalogFolder, "/")."/", "", $requestURI);

	$pattern = '/^\/prod\d+\.htm(?:$|\?)/';
	preg_match($pattern, $subject, $matches);
	
	if ($matches) {
		return true;
	}
	
	return false;
}
if(matchproduct())
{
	$select_column_list = 'pd.products_name, p.products_image, ';
	require('includes/index_filters/default_filter.php');
	
	include(DIR_WS_LANGUAGES . $_SESSION['language'] . '/product_info.php');
	//define('TEXT_PRODUCT_OPTIONS', 'Please Choose: ');

	define('ATTRIBUTES_PRICE_DELIMITER_PREFIX', ' (');
	define('ATTRIBUTES_PRICE_DELIMITER_SUFFIX', ') ');
	require('includes/modules/attributes.php');
	include 'mobile/product.php';
	die();
}

function matchgallery(){
	global $template;
	$requestURI = $_SERVER['REQUEST_URI']; 
	
	$catalogFolder = DIR_WS_CATALOG;
	$catalogFolder = preg_replace("/\\/$/", "", $catalogFolder);
	$subject = preg_replace("/".preg_quote($catalogFolder, "/")."/", "", $requestURI);
  
	$pattern = '/^\/gallery\d+\.htm(?:$|\?)/';
	preg_match($pattern, $subject, $matches);
	if ($matches) {
		return true;
	}
	
	return false;
}

if(matchgallery())
{
	$select_column_list = 'pd.products_name, p.products_image, ';
	require('includes/index_filters/default_filter.php');
	include 'mobile/gallery.php';
	die();
}

	
function matchsearch(){
	global $result;
	global $db;
	global $list_box_contents;
	global $template; 
	
	$requestURI = $_SERVER['REQUEST_URI']; 
	
	$catalogFolder = DIR_WS_CATALOG;
	$catalogFolder = preg_replace("/\\/$/", "", $catalogFolder);
	$subject = preg_replace("/".preg_quote($catalogFolder, "/")."/", "", $requestURI);

	$pattern = '/(^\/search\/?(?:$|\?)|^\/index\.php\?main_page=advanced_search)/';

	preg_match($pattern, $subject, $matches);
	return (boolean) $matches;
}
if(matchsearch())
{
	$select_column_list = 'pd.products_name, p.products_image, ';
	require('includes/index_filters/default_filter.php');
	include 'mobile/search.php';
	die();
}


function mobile_image($src)
{
	if($src == DIR_WS_IMAGES && PRODUCTS_IMAGE_NO_IMAGE_STATUS == '1')
	{
		$src = DIR_WS_IMAGES . PRODUCTS_IMAGE_NO_IMAGE;
    }
 
    // if not in current template switch to template_default
    if(!file_exists($src))
    {
	    $src = str_replace(DIR_WS_TEMPLATES . $template_dir, DIR_WS_TEMPLATES . 'template_default', $src);
    }
 
    return $src;
}

include 'mobile/page.php';
