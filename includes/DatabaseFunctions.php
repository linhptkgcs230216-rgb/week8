<?php

function getPost($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function getAllUsers($pdo) {
    $stmt = $pdo->query("SELECT id, username FROM users ORDER BY username");
    return $stmt->fetchAll();
}

function getAllModules($pdo) {
    $stmt = $pdo->query("SELECT id, module_name FROM modules ORDER BY module_name");
    return $stmt->fetchAll();
}

function updatePost($pdo, $id, $title, $body, $image_path, $user_id, $module_id) {
    $stmt = $pdo->prepare("
        UPDATE posts
        SET title = ?, body = ?, image_path = ?, user_id = ?, module_id = ?
        WHERE id = ?
    ");
    return $stmt->execute([$title, $body, $image_path, $user_id, $module_id, $id]);
}
