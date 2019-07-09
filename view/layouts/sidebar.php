<aside>
    <h2>Links</h2>
    <ul>
        <li>
            <a href=""/">View Cart</a>
        </li>
            <li><a href="/">My Account</a></li>
            <li><a href="/">Logout</a>
            <li><a href="/">Login/Register</a></li>
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
