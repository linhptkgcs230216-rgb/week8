<?php if (isset($errors) && !empty($errors)): ?>
    <div class="errors">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<h2>Ask a New Question</h2>

<form action="addpost.php" method="post" enctype="multipart/form-data">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="<?= htmlspecialchars($title_val ?? '', ENT_QUOTES, 'UTF-8') ?>">

    <label for="body">Question</label>
    <textarea name="body" id="body" rows="5"><?= htmlspecialchars($body_val ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>

    <label for="user_id">Posted by</label>
    <select name="user_id" id="user_id">
        <option value="">-- Select user --</option>
        <?php foreach ($users as $user): ?>
            <option value="<?= $user['id'] ?>" <?= (isset($user_id_val) && $user_id_val == $user['id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="module_id">Module</label>
    <select name="module_id" id="module_id">
        <option value="">-- Select module --</option>
        <?php foreach ($modules as $module): ?>
            <option value="<?= $module['id'] ?>" <?= (isset($module_id_val) && $module_id_val == $module['id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($module['module_name'], ENT_QUOTES, 'UTF-8') ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="image">Screenshot (optional)</label>
    <input type="file" name="image" id="image" accept="image/*">

    <input type="submit" value="Post Question">
</form>

<p><a href="viewpost.php">← Back to all questions</a></p>