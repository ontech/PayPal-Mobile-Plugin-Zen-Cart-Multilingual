<?php if(!isset($_)) require('language_fr.php'); ?>
<!DOCTYPE html>
	<html lang="fr">
	<head>
    <title><?php echo HOME_PAGE_TITLE; ?></title>
	<meta charset="UTF-8" />
    <link rel="search" type="application/opensearchdescription+xml" href="osd.xml" title="<?php echo $_['Search'] ?>"/>

	<script>
	document.cookie = "ezimcc=1;";
	if(!/ezimcc/i.test(document.cookie))
	{
		window.location = "cookies.php";
	}
	var language = { 
		code: "<?php echo $_SESSION['languages_code'] ?>",
		id: "<?php echo $_SESSION['languages_id'] ?>",
		language: "<?php echo $_SESSION['language'] ?>",
		paypal: "<?php echo $_SESSION['PaypalLanguages']['language'] ?>",
	};
	language.checkoutWithPaypal = "<?php echo $_SESSION['PaypalLanguages']['checkoutWithPaypal'] ?>";
	language.checkoutWithPaypalDown = "<?php echo $_SESSION['PaypalLanguages']['checkoutWithPaypalDown'] ?>";
	
	</script>
	<script src="mobile/js/jquery-1.8.0.min.js"></script>
	<script src="mobile/js/jquery.mobile-1.1.1.min.js"></script>
	<script type="text/javascript" src="mobile/js/ezi-mobile.js?3"></script>

	<link rel="stylesheet" href="mobile/css/jquery.mobile-1.1.1.min.css" />
	<link rel="stylesheet" type="text/css" href="mobile/css/style.css" />
	<link rel="stylesheet" type="text/css" href="mobile/css/cart.css" />
	<link rel="stylesheet" type="text/css" href="mobile/css/checkout.css" />

	<link rel="apple-touch-icon" href="../includes/templates/classic/images/logo.gif">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"> 
	<meta name="apple-mobile-web-app-capable" content="yes" />
		
</head>
<body>
<div id="mainpage" data-role="page" data-theme="b">

	<div data-role="header" data-theme="b" style="background:#fff; z-index: 1000;">
    <?php echo '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '" data-role="none" data-inline="true"><img src="'.$template->get_template_dir(HEADER_LOGO_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . HEADER_LOGO_IMAGE .'" style="vertical-align: top; margin-top: -4px; margin-left: -2px; max-height: 45px; max-width: 200px;"/></a>'; ?>
		<h1></h1>
		<a href="#" data-role="none"><img src="mobile/images/napaypal.png" style="width: 70px; margin-top: 2px;"/></a>
			
	    <div data-role="navbar">
	    	<ul>
	            <li><a id="home" href="./"><?php echo $_['Home'] ?></a><span class="ui-icon ui-icon-custom"></span></li>
	            <li><a id="categories" rel="external"><?php echo $_['Categories'] ?></a><span class="ui-icon ui-icon-custom"></span></li>
	            <li><a id="search" href="search/" rel="external"><?php echo $_['Search'] ?></a><span class="ui-icon ui-icon-custom"></span></li>
	            <li><a id="cartlink" class="carticon" href="index.php?main_page=shopping_cart" rel="external" class="ui-icon ui-icon-custom"><?php echo $_['Cart'] ?> <span class="MiniCartQty" style="text-align:center; font-size: 10px; font-weight: normal; width: 20px; height: 15px; z-index: 200; float: right; padding-left: 1px; padding-bottom: 3px; padding-top:2px;"><?php echo $_SESSION['cart']->count_contents(); ?></span></a></li>
	        </ul>
	    </div><!-- /navbar -->					
	</div><!-- /header -->	

	<div id="content" data-role="content">	
	
