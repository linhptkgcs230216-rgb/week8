<?php
require_once __DIR__ . '/../includes/DatabaseConnection.php';
require_once __DIR__ . '/../includes/auth.php';

requireAdmin();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $stmt = $pdo->prepare("DELETE FROM posts WHERE id = ?");
    $stmt->execute([$_POST['delete_id']]);
    header('Location: index.php');
    exit;
}

$stmt = $pdo->query("
    SELECT posts.id, posts.title, users.username, modules.module_name, posts.created_at
    FROM posts
    JOIN users ON posts.user_id = users.id
    JOIN modules ON posts.module_id = modules.id
    ORDER BY posts.created_at DESC
");
$posts = $stmt->fetchAll();

require_once __DIR__ . '/../includes/header.php';
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Admin - Manage Posts</h2>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Module</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $post): ?>
        <tr>
            <td><?= $post['id'] ?></td>
            <td><?= htmlspecialchars($post['title']) ?></td>
            <td><?= htmlspecialchars($post['username']) ?></td>
            <td><?= htmlspecialchars($post['module_name']) ?></td>
            <td><?= $post['created_at'] ?></td>
            <td>
                <form method="POST" style="display:inline" onsubmit="return confirm('Delete this post?');">
                    <input type="hidden" name="delete_id" value="<?= $post['id'] ?>">
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>
