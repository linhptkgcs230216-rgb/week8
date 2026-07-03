<?php
require_once __DIR__ . '/auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Q&A</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="/COMP1841/student/index.php">Student Q&amp;A</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="/COMP1841/student/index.php">Home</a></li>
        <?php if (isLoggedIn()): ?>
          <li class="nav-item"><a class="nav-link" href="/COMP1841/student/post_add.php">New Post</a></li>
          <?php if (isAdmin()): ?>
            <li class="nav-item"><a class="nav-link" href="/COMP1841/student/admin/users.php">Manage Users</a></li>
            <li class="nav-item"><a class="nav-link" href="/COMP1841/student/admin/modules.php">Manage Modules</a></li>
          <?php endif; ?>
          <li class="nav-item"><a class="nav-link" href="/COMP1841/student/logout.php">Logout (<?= htmlspecialchars($_SESSION['username']) ?>)</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="/COMP1841/student/login.php">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="/COMP1841/student/register.php">Register</a></li>
        <?php endif; ?>
        <li class="nav-item"><a class="nav-link" href="/COMP1841/student/contact.php">Contact Admin</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
