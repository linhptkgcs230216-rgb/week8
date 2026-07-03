<header>
    <h1>Student Q&amp;A</h1>
</header>
<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="viewpost.php">Posts</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
            <li><a href="addpost.php">New Post</a></li>
            <?php if (($_SESSION['role'] ?? '') === 'admin'): ?>
                <li><a href="admin/users.php">Manage Users</a></li>
                <li><a href="admin/modules.php">Manage Modules</a></li>
            <?php endif; ?>
            <li><a href="logout.php">Logout (<?= htmlspecialchars($_SESSION['username']) ?>)</a></li>
        <?php else: ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        <?php endif; ?>
        <li><a href="contact.php">Contact Admin</a></li>
    </ul>
</nav>