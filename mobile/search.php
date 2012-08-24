<?php include 'header.php'; ?>

<h4><?php echo $_['Search Results'] ?></h4>
<form action="search?main_page=advanced_search_result" method="get" class="searchpopup">
    <table>
        <tr>
            <td>
                <input class="suggest ui-input-text ui-body-null" type="text" id="searchinput" data-type="search" name="keyword" placeholder="<?php echo $_['Search'] ?>" autocomplete="off" value="<?php echo htmlspecialchars(stripslashes($_GET['keyword'])); ?>">
            </td>
            <td>
                <input type="submit" value="Go" style="background:none; border:2px solid #dedede; box-shadow:2px 2px 2px 2px #999;  border-radius:10px;" data-role="none"/>
            </td></tr></table>
</form>

<?php
if ($result->number_of_rows > 0) {

    $resultset = $db->Execute($result->sql_query);
    $listing = $resultset;
    ?>

    <ul data-role="listview" data-inset="true" id="products" class="products" style="margin-top: 8px;">
        <li data-role="list-divider"><?php echo $_['Results'] ?></li>
    <?php while (!$listing->EOF) :  ?>
            <li style="text-align:center; padding:5px;" class="ui-body-c">
                <div class="hproduct brief" style="text-align:center;">
                    <table width="100%">
                        <tr>
                            <td colspan="2" align="left">
                                <a href="prod<?php echo $listing->fields['products_id']; ?>.htm?products_id=<?php echo $listing->fields['products_id']; ?>"><?php echo htmlspecialchars($listing->fields['products_name']); ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td width="0" style="vertical-align: top;">
                                <a href="prod<?php echo $listing->fields['products_id']; ?>.htm?products_id=<?php echo $listing->fields['products_id']; ?>"><img class="photo" style="margin-top:3px; margin-left:auto; margin-right:auto;" src="<?php echo htmlspecialchars(mobile_image(DIR_WS_IMAGES . $listing->fields['products_image'])); ?>" width="100"/></a>
                            </td>
                            <td style="text-align: left; width: 200px;">
                                <form method="post" action="cart/index.php?action=add_product" class="productform">
                                    <input type="hidden" name="securityToken" value="<?php echo @$_SESSION['securityToken']; ?>" />
                                    <input type="hidden" name="products_id" value="<?php echo $listing->fields['products_id']; ?>"/>
                                    <input type="hidden" name="cart_quantity" value="1" maxlength="6" size="4">

                                    <table width="100"><tr><td style="border:none; vertical-align:middle">					
                                                <span class="price">
													<?php echo zen_get_products_display_price($listing->fields['products_id']) ?>
                                                </span>

                                            </td></tr><tr><td style="border:none; vertical-align:middle;">
                                                <!--{if !OptionSet}-->
                                                <input type="submit" class="buy" data-theme="e" value="<?php echo $_['Add to Cart']; ?>" /><br/>
                                                       <!--{/if}-->
                                                       <a href="prod<?php echo $listing->fields['products_id']; ?>.htm" class="ui-link" style="color: #2489CE !important; text-shadow: none;">More info...</a>
                                            </td></tr></table>
                                </form>
                            </td>
                        </tr>
                    </table>		
                </div>
            </li><?php
    $listing->MoveNext();
	endwhile;   ?>

    </ul>

    <?php
} else {
    echo "<p>" . $_['Your search has produced no results'] . " " . "</p>";
};
?>

<?php include 'returntodesktop.php' ?>

<?php include 'footer.php'; ?>

