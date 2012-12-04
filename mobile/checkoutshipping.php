<?php include 'header.php'; ?>
<style>
    table.reviewaddresses td{
        text-align:left;
        vertical-align:top;

    }
    table.reviewaddresses td:last-child{
        padding-left:10px;

    }
    .ui-field-contain{
        border-bottom-width:0 !important;
    }
    hr.underline{
        padding-top: 10px;
    }
    .moduleRow td{
        cursor:pointer;
    }
    .moduleRow.active td{
        background-color: #8BB4AD;
    }
    .email{
        display: block;
        text-overflow: ellipsis;
        width: 200px;
        overflow: hidden;
    }
</style>
<script>
    function selectRowEffect(x,y) {
        return true;
    }
    $(function(){
        var total = parseFloat($(".total").text());
		var shipping = parseFloat($("[name=shipping]:checked").closest("div.ui-radio").find("span.important.forward").text().replace(/\$/,''));

		$('.total').html(parseFloat(total + shipping).toFixed(2));
		
        $("[name=shipping]").change(function(){
		var selectedshipping = parseFloat($("[name=shipping]:checked").closest("div.ui-radio").find("span.important.forward").text().replace(/\$/,''));
		$('.total').html(parseFloat(total + selectedshipping).toFixed(2));

  		/* $("[type=submit]").attr('disabled','disabled').closest(".buttonRow.forward").css("opacity", "0.4");

		 $.ajax({
		    url: "?main_page=checkout_shipping",
                    data: {action:"process", shipping: $("[name=shipping]:checked").val(), comments: $('[name=comments]').val()},
                    type: "POST",
                    success: function(r){

                        $("[type=submit]").removeAttr('disabled').closest(".buttonRow.forward").css("opacity", "1");
                    }
                }); */

        });

    });
</script>

<div id="main-page">
    <div id="content">

        <div class="centerColumn" id="checkoutShipping">

            <?php echo zen_draw_form('checkout_address', zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'), 'POST', 'data-ajax="false"') . zen_draw_hidden_field('action', 'process'); ?>

            <h1 id="checkoutShippingHeading"><?php echo $_['Addresses']; ?></h1>
            <?php if ($messageStack->size('checkout_shipping') > 0) echo $messageStack->output('checkout_shipping'); ?>

            <h2 id="checkoutShippingHeadingAddress"><?php echo TITLE_SHIPPING_ADDRESS; ?></h2>

            <div id="checkoutShipto" class="floatingBox back">

                <address class=""><?php echo zen_address_label($_SESSION['customer_id'], $_SESSION['sendto'], true, ' ', '<br />'); ?></address>
            </div>
            <div class="floatingBox important forward"><?php echo TEXT_CHOOSE_SHIPPING_DESTINATION; ?></div>
            <br class="clearBoth" />

            <?php
            if (zen_count_shipping_modules() > 0) {
                ?>

                <h2 id="checkoutShippingHeadingMethod"><?php echo TABLE_HEADING_SHIPPING_METHOD; ?></h2>

                <?php
                if (sizeof($quotes) > 1 && sizeof($quotes[0]) > 1) {
                    ?>

                    <div id="checkoutShippingContentChoose" class="important"><?php echo TEXT_CHOOSE_SHIPPING_METHOD; ?></div>

                    <?php
                } elseif ($free_shipping == false) {
                    ?>
                    <div id="checkoutShippingContentChoose" class="important"><?php echo TEXT_ENTER_SHIPPING_INFORMATION; ?></div>

                    <?php
                }
                ?>
                <?php
                if ($free_shipping == true) {
                    ?>
                    <div id="freeShip" class="important" ><?php echo FREE_SHIPPING_TITLE; ?>&nbsp;<?php echo $quotes[$i]['icon']; ?></div>
                    <div id="defaultSelected"><?php echo sprintf(FREE_SHIPPING_DESCRIPTION, $currencies->format(MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING_OVER)) . zen_draw_hidden_field('shipping', 'free_free'); ?></div>

                    <?php
                } else {
                    $radio_buttons = 0;
                    ?> <fieldset  data-role="controlgroup"> 
                       <?php
                    for ($i = 0, $n = sizeof($quotes); $i < $n; $i++) {
                        // bof: field set
                        // allows FedEx to work comment comment out Standard and Uncomment FedEx
                        //      if ($quotes[$i]['id'] != '' || $quotes[$i]['module'] != '') { // FedEx
                        if ($quotes[$i]['module'] != '') { // Standard
                            ?>
                            
<!--                                <legend></legend>-->

                                <?php
                                if (isset($quotes[$i]['error'])) {
                                    ?>
                                    <div><?php echo $quotes[$i]['error']; ?></div>
                                    <?php
                                } else {
                                    for ($j = 0, $n2 = sizeof($quotes[$i]['methods']); $j < $n2; $j++) {
                                        // set the radio button to be checked if it is the method chosen
                                        $checked = (($quotes[$i]['id'] . '_' . $quotes[$i]['methods'][$j]['id'] == $_SESSION['shipping']['id']) ? true : false);

                                        if (($checked == true) || ($n == 1 && $n2 == 1)) {
                                            //echo '      <div id="defaultSelected" class="moduleRowSelected">' . "\n";
                                            //} else {
                                            //echo '      <div class="moduleRow">' . "\n";
                                        }
                                        ?>
                                        

                                        <?php echo zen_draw_radio_field('shipping', $quotes[$i]['id'] . '_' . $quotes[$i]['methods'][$j]['id'], $checked, 'id="ship-' . $quotes[$i]['id'] . '-' . str_replace(' ', '-', $quotes[$i]['methods'][$j]['id']) . '"'); ?>
                                        <label for="ship-<?php echo $quotes[$i]['id'] . '-' . str_replace(' ', '-', $quotes[$i]['methods'][$j]['id']); ?>" class="checkboxLabel" >
                                            <?php
                                        if (($n > 1) || ($n2 > 1)) {
                                            ?>
                                            <span class="important forward"><?php echo $currencies->format(zen_add_tax($quotes[$i]['methods'][$j]['cost'], (isset($quotes[$i]['tax']) ? $quotes[$i]['tax'] : 0))); ?></span>
                                            <?php
                                        } else {
                                            ?>
                                            <span class="important forward"><?php echo $currencies->format(zen_add_tax($quotes[$i]['methods'][$j]['cost'], $quotes[$i]['tax'])) . zen_draw_hidden_field('shipping', $quotes[$i]['id'] . '_' . $quotes[$i]['methods'][$j]['id']); ?></span>
                                            <?php
                                        }
                                        ?>
                                            (<?php echo $quotes[$i]['module']; ?><?php if (isset($quotes[$i]['icon']) && zen_not_null($quotes[$i]['icon'])) {
                    echo "&nbsp;" . $quotes[$i]['icon'];
                } ?>) 
                                            <?php echo $quotes[$i]['methods'][$j]['title']; ?></label>
                                        <!--</div>-->
                                       
                                        <?php
                                        $radio_buttons++;
                                    }
                                }
                                ?>

                          
                            <?php
                        }
                       
                        // eof: field set
                    }
                     ?>   </fieldset> <?php
                }
                ?>

                <?php
            } else {
                ?>
                <h2 id="checkoutShippingHeadingMethod"><?php echo TITLE_NO_SHIPPING_AVAILABLE; ?></h2>
                <div id="checkoutShippingContentChoose" class="important"><?php echo TEXT_NO_SHIPPING_AVAILABLE; ?></div>
                <?php
            }
            ?>


            <fieldset class="shipping" id="comments">
                <legend><?php echo TABLE_HEADING_COMMENTS; ?></legend>
<?php echo zen_draw_textarea_field('comments', '45', '3'); ?>
            </fieldset>
                <div style="line-height:2em; font-size: 1.5em;text-align:center;">Total: <span class="total"><?php echo number_format($_SESSION['cart']->total,2) ?></span></div>
                <div class="buttonRow forward">  <input type="submit" value="<?php echo ucwords($_['Pay Now']) ?>" data-theme="e" data-role="button" />
            </div>

            </form>
        </div>
    </div><!--content-->
</div><!--mainpage-->
<?php
include 'footer.php';
