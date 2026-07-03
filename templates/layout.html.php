<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Student Q&A') ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include __DIR__ . '/nav.html.php'; ?>

<main>
    <?= $output ?? '' ?>
</main>

<footer>
    <p>&copy; <?= date('Y') ?> Student Q&amp;A System</p>
</footer>

</body>
</html>