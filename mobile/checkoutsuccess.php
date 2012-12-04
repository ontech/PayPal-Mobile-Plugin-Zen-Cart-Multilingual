<?php include 'header.php'; ?>
<?php $order = $orders->fields; ?>
<?php $currencies = new currencies() ?>

<h1 id="checkoutSuccessHeading"><?php echo $_['Thank You! We Appreciate your Business!'] ?></h1>

<p style="background:#fff; border:1px solid #ccc; padding:10px; text-align:center; font-weight:bold;">
    <?php echo str_replace('{order}', $orders_id, $_['Your order number is x']); ?>
</p>
<hr/>
<h2>Products</h2>
<ul>

<?php foreach ($notificationsArray as $notifications) { ?>
    <li><label class="checkboxLabel" for="<?php echo 'notify-' . $notifications['counter']; ?>"><?php echo $notifications['products_name']; ?></label></li>
<?php } ?>
</ul>
<hr/>
<h2>Order Total</h2>
<ul>
    <li>Order Total: <?php echo $currencies->display_price($order['order_total'], $order['order_tax'], 1); ?></li>
</ul>
<?php
/**
 * require the html_defined text for checkout success
 */

 // require($define_page);
?>

<?php include 'returntodesktop.php' ?>
<?php include 'footer.php'; ?>