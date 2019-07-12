<?php include 'view/layouts/header.php'; ?>
<main>
    <h1>Your Cart</h1>
    <?php if (Cart::count() == 0) : ?>
        <p>There are no products in your cart.</p>
    <?php else: ?>
        <p>To remove an item from your cart, change its quantity to 0.</p>
        <form action="/?action=cart" method="post">
            <input type="hidden" name="method" value="update">
            <table id="cart">
            <tr id="cart_header">
                <th class="left">Item</th>
                <th class="right">Price</th>
                <th class="right">Discount</th>
                <th class="right">Quantity</th>
                <th class="right">Total</th>
            </tr>
            <?php foreach (Cart::content() as $product_id => $item) : ?>
            <tr>
                <td><?php echo htmlspecialchars($item['productName']); ?></td>
                <td class="right">
                    <?php echo sprintf('$%.2f', $item['listPrice']); ?>
                </td>
                <td class="right"><?php echo sprintf('$%.2f', $item['discountPercent']); ?>%</td>
                <td class="right">
                    <input type="text" size="3" class="right"
                           name="items[<?php echo $product_id; ?>]"
                           value="<?php echo $item['quantity']; ?>">
                </td>
                <td class="right">
                    <?php echo sprintf('$%.2f', $item['line_price']); ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr id="cart_footer" >
                <td colspan="3" class="right" ><b>Total</b></td>
                <td class="right">
                    <?php echo sprintf('$%.2f', Cart::total()); ?>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="right">
                    <input type="submit" value="Update Cart">
                </td>
            </tr>
            </table>
        </form>

    <?php endif; ?>

    <p>Return to: <a href="/">Home</a></p>

    <!-- display most recent category -->
    <?php if (isset($_SESSION['last_category_id'])) :
            $category_url = '?category_id=' . $_SESSION['last_category_id'];
        ?>
        <p>Return to: <a href="<?php echo $category_url; ?>">
            <?php echo $_SESSION['last_category_name']; ?></a></p>
    <?php endif; ?>

    <!-- if cart has items, display the Checkout link -->
    <?php if (Cart::count() > 0) : ?>
        <p>
            Proceed to: <a href="/?action=checkout">Checkout</a>
        </p>
    <?php endif; ?>
</main>
<?php include 'view/layouts/footer.php'; ?>