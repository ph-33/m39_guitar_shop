<?php include 'view/layouts/header.php'; ?>
<?php include 'view/layouts/sidebar.php'; ?>
<main>
    <h1>Login</h1>
    <form action="/?action=login" method="post" id="login_form">
        <label>E-Mail:</label>
        <input type="text" name="email"
               value="<?php echo htmlentities(filter_input(INPUT_POST, 'email')); ?>" size="30">
        <?php if(isset($errors['email'])): ?>
            <span class="error"><?php echo $errors['email'] ?></span>
        <?php endif ?><br>

        <label>Password:</label>
        <input type="password" name="password" size="30">
        <?php if(isset($errors['password'])): ?>
            <span class="error"><?php echo $errors['password'] ?></span>
        <?php endif ?><br>

        <input type="submit" value="Login">
        <?php if(isset($errors['login'])): ?>
            <span class="error"><?php echo $errors['login']; ?></span>
        <?php endif; ?><br>
    </form>
</main>
<?php include 'view/layouts/footer.php'; ?>
