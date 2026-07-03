<?php
include 'includes/DatabaseConnection.php';

$errors = [];
$title_val = $body_val = '';
$user_id_val = $module_id_val = null;

// Load dropdowns
$users = $pdo->query('SELECT id, username FROM users ORDER BY username')->fetchAll();
$modules = $pdo->query('SELECT id, module_name FROM modules ORDER BY module_name')->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title_val   = trim($_POST['title'] ?? '');
    $body_val    = trim($_POST['body'] ?? '');
    $user_id_val = $_POST['user_id'] ?? '';
    $module_id_val = $_POST['module_id'] ?? '';

    if (empty($title_val))    $errors[] = 'Title is required.';
    if (empty($body_val))     $errors[] = 'Question body is required.';
    if (empty($user_id_val))  $errors[] = 'Please select a user.';
    if (empty($module_id_val)) $errors[] = 'Please select a module.';

    // Handle image upload
    $image_path = null;
    if (!empty($_FILES['image']['name'])) {
        $allowed = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($_FILES['image']['type'], $allowed)) {
            $errors[] = 'Only JPG, PNG, GIF images allowed.';
        } else {
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $filename = uniqid('img_', true) . '.' . $ext;
            $dest = 'uploads/' . $filename;
            move_uploaded_file($_FILES['image']['tmp_name'], $dest);
            $image_path = $dest;
        }
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare('INSERT INTO posts (title, body, image_path, user_id, module_id) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$title_val, $body_val, $image_path, $user_id_val, $module_id_val]);
        header('Location: viewpost.php');
        exit;
    }
}

$title = 'Ask a Question';
ob_start();
include 'templates/addpost.html.php';
$output = ob_get_clean();

include 'templates/layout.html.php';