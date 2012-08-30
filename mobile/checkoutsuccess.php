<?php include 'header.php'; ?>

<h1 id="checkoutSuccessHeading"><?php echo $_['Thank You! We Appreciate your Business!'] ?></h1>

<p style="background:#fff; border:1px solid #ccc; padding:10px; text-align:center; font-weight:bold;">
<?php echo str_replace('{order}', $orders_id, $_['Your order number is x']); ?></p>

<?php
/**
 * require the html_defined text for checkout success
 */

  require($define_page);
?>

<?php include 'returntodesktop.php' ?>
