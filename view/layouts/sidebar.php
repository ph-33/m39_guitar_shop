<aside>
    <h2>Links</h2>
    <ul>
        <li>
            <a href="/?action=cart">View Cart</a>
        </li>
            <li><a href="/">My Account</a></li>
            <?php if(isset($_SESSION['customer'])): ?>
                <li><a href="/?action=logout">Logout</a>
            <?php else: ?>
                <li><a href="/?action=login">Login</a></li>
                <li><a href="/?action=register">Register</a></li>
            <?php endif; ?>
        <li>
            <a href="/">Home</a>
        </li>
    </ul>

    <h2>Categories</h2>
    <ul>
        <!-- display links for all categories -->
        <?php $categories = get_categories(); ?>
        <?php foreach ($categories as $category): ?>
        <li>
            <a href="/?category_id=<?php echo $category['categoryID'] ?>">
                <?php echo htmlentities($category['categoryName'])?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>

    <h2>Temp Link</h2>
    <ul>
        <li>
            <!-- This link is for testing only.
                 Remove it from a production application. -->
            <a href="/admin">Admin</a>
        </li>
    </ul>
</aside>
