<aside>
    <h2>Links</h2>
    <ul>
        <li>
            <?php if(isset($_SESSION['admin'])): ?>
                <a href="/admin?action=logout">Logout</a>
            <?php else: ?>
                <a href="/admin?action=login">Login</a>
            <?php endif; ?>
        </li>
        <li>
            <a href="/">Home</a>
        </li>
        <li>
            <a href="/admin">Admin</a>
        </li>
    </ul>

    <h2>Modules</h2>
    <ul>
        <li><a href="/admin?action=category">Category</a></li>
        <li><a href="/admin?action=product">Product</a></li>
        <li><a href="/admin?action=order">Order</a></li>
        <li><a href="/admin?action=administrator">Admin account</a></li>
    </ul>
</aside>
