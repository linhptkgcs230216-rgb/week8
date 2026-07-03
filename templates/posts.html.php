<?php if (isset($error)): ?>

    <p><?= $error ?></p>

<?php else: ?>

    <h2>All Questions</h2>
    <p><a href="addpost.php">+ Ask a new question</a></p>

    <table border="2px">
        <thead>
            <tr>
                <th>Title</th>
                <th>Posted by</th>
                <th>Module</th>
                <th>Date</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>

        <?php foreach ($posts as $post): ?>
            <tr>
                <td width="250px">
                    <?= htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8') ?>
                </td>

                <td width="120px">
                    <?= htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') ?>
                </td>

                <td width="120px">
                    <?= htmlspecialchars($post['module_name'], ENT_QUOTES, 'UTF-8') ?>
                </td>

                <td width="150px">
                    <?php $display_date = date('D d M Y', strtotime($post['created_at'])); ?>
                    <?= htmlspecialchars($display_date, ENT_QUOTES, 'UTF-8') ?>
                </td>

                <td width="120px">
                    <?php if (!empty($post['image_path'])): ?>
                        <img height="80px" src="<?= htmlspecialchars($post['image_path'], ENT_QUOTES, 'UTF-8') ?>">
                    <?php endif; ?>
                </td>

                <td width="120px">
                    <a href="editpost.php?id=<?= $post['id'] ?>">Edit</a>
                    <form action="deletepost.php" method="post">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($post['id'], ENT_QUOTES, 'UTF-8') ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

<?php endif; ?>