<?php 

$current_path = dirname(__FILE__);

if(file_exists('includes/application_top.php')){
    require('includes/application_top.php');          
} else {  
    echo '<font color="red">Error: </font>'.$current_path.'/includes/application_top.php doesn\'t exist.';
    exit();
} 
      
// check to see if "exec()" is disabled in PHP -- if not, get additional info via command line
    $php_disabled_functions = '';
    $exec_disabled = false;
    $php_disabled_functions = @ini_get("disable_functions");
    if ($php_disabled_functions != '') {
      if (in_array('exec', preg_split('/,/', str_replace(' ', '', $php_disabled_functions)))) {
        $exec_disabled = true;
      }
    }
    if (!$exec_disabled) {
      @exec('uname -a 2>&1', $output, $errnum);
      if ($errnum == 0 && sizeof($output)) list($system, $host, $kernel) = preg_split('/[\s,]+/', $output[0], 5);
      $output = '';
      if (DISPLAY_SERVER_UPTIME == 'true') {
        @exec('uptime 2>&1', $output, $errnum);
        if ($errnum == 0) {
          $uptime = $output[0];
        }
      }
    }  

$FAILED_STATUS = '<font color="red"><b>FAILED</b></font>';
$OK_STATUS = '<font color="#00a651"><b>OK</b></font>';

?>
  
<html>
<head>
<title>Mobile Check list</title>

<style type="text/css">
 table, td, tr {font-family: sans-serif; font-size: 12px;}
.p {text-align: center;}
.e {background-color: #ccccff; font-weight: bold; font-size: 12px;}
.h {background-color: #9999cc; font-weight: bold; font-size: 12px;}
.v {background-color: #eeeeee; font-size: 14px;}
i {color: #666666; font-size: 12px;}
hr {display: none; font-size: 12px;}
.tabd {border: 1px #eeeeee solid;}
.support{font-family: sans-serif;}
</style>

</head>

<body>
<table width="50%" cellspacing="0" cellpadding="4" class='tabd'>
  <tr>
    <td height="44"><h1>Server Infomation</h1></td>
	  <td style="background-color:#cce3f8;">
		<a href="/" onclick="document.cookie='miabdebug=1';document.location.href=document.location.href;">Click To Preview Mobile Plugin</a>
	</td>
  </tr>
  
  <tr class='v'>
    <td><strong>Server Host</strong></td> 
    <td><?php echo $host; ?></td>
  </tr>
  
  <tr>
    <td><strong>Server OS:</strong></td>
    <td><?php echo $system .' '.$kernel; ?> &nbsp;&nbsp;</td>
  </tr>
  
  <tr class='v'>
    <td><strong>Server Date:</strong></td> 
    <td><?php echo date('Y-m-d H:i:s'); ?> &nbsp;</td>
  </tr>
  <tr>  
    <td width="51%"><strong>Http Server:</strong></td> 
    <td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td>
  </tr>
  
  <tr class='v'>    
    <td width="51%"><strong>Database Host</strong></td>
    <td><?php echo DB_SERVER; ?></td>
  </tr>    
  <tr>
    <td width="51%"><strong>Database:</strong></td> 
    <td>MySQL <?php echo mysql_get_server_info(); ?></td>
  </tr>

  <tr class='v'>
    <td><strong>PHP Version</strong></td> 
    <td><?php echo PHP_VERSION . ' (Zend Version ' . zend_version() . ')'; ?></td>
  </tr>
</table>

<div class="support">
	<h3>For any assistance or support, please e-mail to 
		<a href="mailto:DL-PP-MIAB-SUPPORT@ebay.com">DL-PP-MIAB-SUPPORT@ebay.com</a>
	</h3>
</div>

<br><br>
<table width="80%" cellspacing="0" cellpadding="4" class='tabd'>
  <tr>
    <td colspan="3" height="44"><h1>Shopping cart capabilities</h1></td>
  </tr>

<?php

// check if define
$isShoppingCartValid = false;

  // Zen Cart
	if(defined("PROJECT_VERSION_NAME"))
	{
      $cart_version = PROJECT_VERSION_NAME.' '.PROJECT_VERSION_MAJOR.'.'.PROJECT_VERSION_MINOR;
  }
// osCommerce
	else if(defined("PROJECT_VERSION"))
	{
      $current_version=$major_version='';
      
			preg_match("/\d+\.?\d+/",PROJECT_VERSION, $matches);
			if($matches)
				$vc = (float)$matches[0];
  
      if($vc == 2.3) {
        $current_version = tep_get_version();         
      }
      
      $cart_version =  PROJECT_VERSION;
      if($current_version)
         $cart_version .=" ($current_version)";  
	
  }else  
     $cart_version = 'N.A'; 

  $support='<font color="red">Not supported</font>';
  $status='<font color="red">Failed</font>';
  
  if(preg_match('/osCommerce/',$cart_version) &&(preg_match('/2.2/',$cart_version) || preg_match('/2.3/',$cart_version))) {
      $support='<font color="#00a651"><b>2.2 and 2.3 are supported</b></font>';  
      $status='<font color="#00a651"><b>OK</b></font>';
	  tep_session_unregister('navigation');
	  $isShoppingCartValid = true;
  }
  if(preg_match('/Zen\sCart/',$cart_version) &&(preg_match('/1.3.9/',$cart_version) || preg_match('/1.3.8/',$cart_version)|| preg_match('/1.5.0/',$cart_version)|| preg_match('/1.5.1/',$cart_version)))  {
      $support='<font color="#00a651"><b>1.3.8, 1.3.9, 1.5.0 & 1.5.1 are supported</b></font>'; 
      $status='<font color="#00a651"><b>OK</b></font>';
	  $isShoppingCartValid = true;
  }
  
?>  

  <tr class='v'>
    <td><strong>Shopping Cart:</strong></td> 
    <td><?php echo $cart_version;?></td>
    <td><?php echo $status.'<br>('.$support.')';?></td>
  </tr>

<?php
if($isShoppingCartValid)
{
	//-----------------
	//Payment Module
	//-----------------

	//osCommerce
	if(preg_match('/^osCommerce/',$cart_version)) {

		// Check EC 
		$key_value_query = tep_db_query("select configuration_title, configuration_value, configuration_key
			  from " . TABLE_CONFIGURATION . " 
			  where configuration_key like 'MODULE_PAYMENT_%_STATUS'");
		$r=0;      
		while ($key_value = tep_db_fetch_array($key_value_query)){
			$keys_payment[$r]['title'] = $key_value['configuration_title'];
			$keys_payment[$r]['value'] = $key_value['configuration_value'];
			$keys_payment[$r]['key'] = $key_value['configuration_key'];
			$r++;     
		}   
		//print_r($keys_payment);


	}else if(preg_match('/^Zen Cart/',$cart_version)) {
		 
		$key_value = $db->Execute("select configuration_title, configuration_value, configuration_key
			  from " . TABLE_CONFIGURATION . " 
			  where configuration_key like 'MODULE_PAYMENT_%_STATUS'");
		$r=0;
		while (!$key_value->EOF) {      
			$keys_payment[$r]['title'] = $key_value->fields['configuration_title'];
			$keys_payment[$r]['value'] = $key_value->fields['configuration_value'];
			$keys_payment[$r]['key'] = $key_value->fields['configuration_key'];
			$key_value->MoveNext(); 
			$r++;    
		} 
		//print_r($keys_payment);   

	} else
		echo " Error to connect DB";
		

	?>

	  <tr>
		  <td><strong>Payment Module:</strong></td>
		  <td><?php  
		  
			  $ppmodule=0;
			  foreach($keys_payment as $key => $value) {
			  
				$mvalue=$value['value'];
							
				if(preg_match('/PAYPALWPP/',$value['key']) || preg_match('/PAYPAL_EXPRESS/',$value['key'])) {
					if ($value['value']=='False')
					   $mvalue='<font color="red">'.$value['value'].'</font>';             
					$ppmodule=1;                  
				}
				echo $value['title'] .' ('. $value['key'] .') ='.$mvalue."<br><br>";                  
					  
			  }
			  
			  if(!$ppmodule)
				echo '<br><font color="red">PayPal Express Checkout Module is not installed.</font>';             
			  ?>
		  </td>
		  <td>
			<?php
				if(!$ppmodule){
					echo $FAILED_STATUS;
				} else {
					echo $OK_STATUS;
				}
			?>
		  </td>
	  </tr>
	  
	<?php


	//-----------------
	//Shipping Module
	//-----------------

	//osCommerce
	if(preg_match('/^osCommerce/',$cart_version)) {

		$key_value_query = tep_db_query("select configuration_title, configuration_value, configuration_key
			  from " . TABLE_CONFIGURATION . " 
			  where configuration_key like 'MODULE_SHIPPING_%_STATUS'");
		$r=0;      
		while ($key_value = tep_db_fetch_array($key_value_query)) {
			$key_shipping[$r]['title'] = $key_value['configuration_title'];
			$key_shipping[$r]['value'] = $key_value['configuration_value'];
			$key_shipping[$r]['key'] = $key_value['configuration_key'];   
			$r++;
		}      
		//print_r($key_shipping);

	}else if(preg_match('/^Zen Cart/',$cart_version)) {

		$key_value = $db->Execute("select configuration_title, configuration_value, configuration_key
			  from " . TABLE_CONFIGURATION . " 
			  where configuration_key like 'MODULE_SHIPPING_%_STATUS'");
		$r=0;
		while (!$key_value->EOF) {      
			$key_shipping[$r]['title'] = $key_value->fields['configuration_title'];
			$key_shipping[$r]['value'] = $key_value->fields['configuration_value'];
			$key_shipping[$r]['key'] = $key_value->fields['configuration_key']; 
			$key_value->MoveNext(); 
			$r++;    
		} 
		//print_r($keys_payment);   

	} else
		echo " Error to connect DB";
			
	?>  
	  
	  <tr class='v'>
		  <td><strong>Shipping Module:</strong></td>
		  <td><?php
			  $shippingModuleCount = 0;
			  foreach($key_shipping as $key => $value) {
				echo $value['title'] .' ('. $value['key'] .') ='.$value['value']."<br><br>";
				$shippingModuleCount++;
			  }
			  ?>
		  </td>
		  <td>
			<?php
				if($shippingModuleCount == 0){
					echo 'No Shipping module found(Optional)';
				} else {
					echo $OK_STATUS;
				}
			?>
		  </td>
	  </tr>

	<?php

	//----------------------------------
	//Get Store logo
	//----------------------------------
	  $storelogo ='<font color=red>Logo not found</font>';
		
	  if(preg_match('/^osCommerce/',$cart_version) && file_exists($current_path.'/images/store_logo.png'))
		$storelogo = '<img src="images/store_logo.png">';

	  if(preg_match('/^Zen Cart/',$cart_version) && file_exists($current_path.'/includes/templates/classic/images/logo.gif'))  
		 $storelogo = '<img src="includes/templates/classic/images/logo.gif">';

	?>
	 
	  <tr>
		  <td><strong>Store Logo:</strong></td>
		  <td><?php
				  echo $storelogo;
			  ?>
		  </td>
		  <td>
			<?php
				if($storelogo == '<font color=red>Logo not found</font>'){
					echo $FAILED_STATUS;
				} else {
					echo $OK_STATUS;
				}
			?>
		  </td>
	  </tr>
	 
	<?php

	//----------------------------------
	//Check Mobile Plugin installed?
	//----------------------------------

			$mobileplugin = '<font color="#00a651"><b>Doesn\'t exist</b></font>';
			$filename='mobile.php'; 
			$dirname = 'mobile';
			
			if (file_exists($current_path.'/'.$filename) && is_dir($current_path.'/'.$dirname)) 
				$mobileplugin = 'Yes';
	?>  

	  <tr class='v'>
		  <td><strong>Mobile folder & mobile.php exist:</strong></td>
		  <td>
			<?php
				  echo $mobileplugin;
			 ?>
		  </td>
		  <td>
			<?php
				if($mobileplugin == 'Yes'){
					echo '<font color="orange"><b>Warning</b></font>';
				} else {
					echo $OK_STATUS;
				}
			?>
		   </td>
	  </tr>
 <?php } ?>
</table>

<?php if($isShoppingCartValid)
{  
?>
	<br /><br /><br />

	<?php
		//----------------------------------
		// Test Product Page
		//----------------------------------
		$mainPageSQL = "select p.products_id, pd.products_name, pd.products_description, p.products_model, p.products_quantity, p.products_image, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1'and pd.products_id = p.products_id and pd.language_id = '1' limit 10";
		
		$productCount = 0;
		$productsList = array();
		if(preg_match('/^osCommerce/',$cart_version)) {
			$key_value_query = tep_db_query($mainPageSQL);
			while ($key_value = tep_db_fetch_array($key_value_query)) { 
				$productsList[$productCount]['products_name'] = $key_value['products_name'];
				$productsList[$productCount]['products_image']  = $key_value['products_image'];
				$productsList[$productCount]['products_price']  = $key_value['products_price'];
				$productsList[$productCount]['products_description']  = $key_value['products_description'];
				$productCount++;
			}
		}else if(preg_match('/^Zen Cart/',$cart_version)) {
			//Zen Cart
			$key_value = $db->Execute($mainPageSQL); 
			
			while (!$key_value->EOF) { 
				$productsList[$productCount]['products_name'] = $key_value->fields['products_name'];
				$productsList[$productCount]['products_image'] = $key_value->fields['products_image'];
				$productsList[$productCount]['products_price'] = $key_value->fields['products_price'];
				$productsList[$productCount]['products_description'] = $key_value->fields['products_description'];
				$productCount++;
				
				$key_value->MoveNext();
			}
		} else
		echo " Error to connect DB";
		
		print_r($productList);
	?>  
	<table width="80%" cellspacing="0" cellpadding="4" class='tabd'>
		<tr>
			<td colspan="4" height="44"><h1>Testing - Fetch Products Information</h1></td>
		</tr>
		<tr class='v'>
			<td><b>Products Name</b></td>
			<td><b>Products Image</b></td>
			<td><b>Products Price</b></td>
			<td><b>Products Description</b></td>
		</tr>
		<?php
			$swapColor = false;
			for($i=0; $i < count($productsList); $i++){
				
				if($swapColor){
					$trClass = 'class="v"';
				} else {
					$trClass = '';
				}
				
			?>
				<tr <?php echo $trClass ?>>
					<td><?php echo $productsList[$i]['products_name'] ?></td>
					<td><?php echo $productsList[$i]['products_image'] ?></td>
					<td><?php echo $productsList[$i]['products_price'] ?></td>
					<td><?php echo $productsList[$i]['products_description'] ?></td>
				</tr>
			<?php
				if($swapColor){
					$swapColor = false;
				} else {
					$swapColor = true;
				}
			}
		?>
	</table>
	
	<br /><br /><br />
	
	<?php
		//----------------------------------
		// Test Main, Categories Page
		//----------------------------------
		
		$mainPageSQL = "select c.categories_id, cd.categories_name, c.categories_image, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.categories_id = cd.categories_id and cd.language_id = '1' order by sort_order, cd.categories_name";
		
		$categoryCount = 0;
		$categoryList = array();
		if(preg_match('/^osCommerce/',$cart_version)) {
			$key_value_query = tep_db_query($mainPageSQL);
			while ($key_value = tep_db_fetch_array($key_value_query)) { 
				$categoryList[$categoryCount]['categories_name'] = $key_value['categories_name'];
				$categoryList[$categoryCount]['categories_image'] = $key_value['categories_image'];
				$categoryCount++;
			}
			}else if(preg_match('/^Zen Cart/',$cart_version)) {
			//Zen Cart
			$key_value = $db->Execute($mainPageSQL);
			while (!$key_value->EOF) { 
				$categoryList[$categoryCount]['categories_name'] = $key_value->fields['categories_name'];
				$categoryList[$categoryCount]['categories_image'] =$key_value->fields['categories_image'];
				$categoryCount++;
				
				$key_value->MoveNext();
			}
		} else
		echo " Error to connect DB";
		
	?>  
	<table width="80%" cellspacing="0" cellpadding="4" class='tabd'>
		<tr>
			<td colspan="4" height="44"><h1>Testing - Fetch Categories Information</h1></td>
		</tr>
		<tr class='v'>
			<td><b>Categories Name</b></td>
			<td><b>Categories Images</b></td>
		</tr>
		<?php
			for($i=0; $i < count($productsList); $i++){
			?>
			<tr>
				<td><?php echo $categoryList[$i]['categories_name'] ?></td>
				<td><?php echo $categoryList[$i]['categories_image'] ?></td>
			</tr>
			<?php
			}
		?>
	</table>
	
	<br /><br /><br />

	<?php
		//----------------------------------
		// Display tables columns
		//----------------------------------
	?>  
	<table width="80%" cellspacing="0" cellpadding="4" class='tabd'>
		<tr>
			<td colspan="2" height="44"><h1>List table fields</h1></td>
		</tr>
		<tr class='v'>
			<td><b>Table Name</b></td>
			<td><b>Columns Name - Column Type</b></td>
		</tr>
		<?php
			$tablesArray = array(TABLE_PRODUCTS, TABLE_ORDERS, TABLE_ADDRESS_BOOK);
			
			foreach($tablesArray as $tableName){
				//osCommerce
				if(preg_match('/^osCommerce/',$cart_version)) {
					$key_value_query = tep_db_query("SHOW COLUMNS FROM ".$tableName);
					$count = 0;
					while ($key_value = tep_db_fetch_array($key_value_query)) { 
						$printTableName = "";
						if($count == 0){
							$printTableName = $tableName;
						}
						$columnName = $key_value['Field'];
						$columnType = $key_value['Type'];
					?>
						<tr>
							<td><?php echo $printTableName; ?></td>
							<td><?php echo $columnName; ?> - <?php echo $columnType; ?></td>
						</tr>
					<?php
						$count++;
					}
				}else if(preg_match('/^Zen Cart/',$cart_version)) {
				//Zen Cart
					$key_value = $db->Execute("SHOW COLUMNS FROM ".$tableName);
					while (!$key_value->EOF) { 
						$printTableName = "";
						if($count == 0){
							$printTableName = $tableName;
						}
						
						$columnName = $key_value->fields['Field'];
						$columnType = $key_value->fields['Type'];
						
						$key_value->MoveNext();
					?>
						<tr>
							<td><?php echo $printTableName; ?></td>
							<td><?php echo $columnName; ?> - <?php echo $columnType; ?></td>
						</tr>
					<?php
					}
				} else
				echo " Error to connect DB";
			}
		?>
	</table> 
 <?php } ?>
</body>
</html>

