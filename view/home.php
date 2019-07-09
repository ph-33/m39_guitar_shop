<?php include 'view/layouts/header.php'; ?>
<?php include 'view/layouts/sidebar.php'; ?>
<main class="nofloat">
    <h1>Featured products</h1>
    <p>We have a great selection of musical instruments including
        guitars, basses, and drums. And we're constantly adding more to give
        you the best selection possible!
    </p>
    <table>
        <?php foreach ($products as $product): ?>
        <tr>
            <td class="product_image_column" >
                <img src="public/images/<?php echo $product['productCode']; ?>.png"
                     alt="&nbsp;">
            </td>
            <td>
                <p>
                    <a href="/?product_id=<?php echo $product['productID']; ?>">
                        <?php echo $product['productName']; ?>
                    </a>
                </p>
                <p>
                    <b>Your price:</b>
                    <?php echo number_format($product['listPrice']); ?>
                </p>
                <p><?php echo $product['description']; ?></p>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</main>
<?php include 'view/layouts/footer.php'; ?>