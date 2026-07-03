<?php
include 'includes/DatabaseConnection.php';

try {
    $sql = 'SELECT posts.id, posts.title, posts.body, posts.image_path, posts.created_at,
                   users.username, modules.module_name
            FROM posts
            JOIN users ON posts.user_id = users.id
            JOIN modules ON posts.module_id = modules.id
            ORDER BY posts.created_at DESC';
    $posts = $pdo->query($sql);
    $title = 'All Questions';

    ob_start();
    include 'templates/posts.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include 'templates/layout.html.php';