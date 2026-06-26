<?php
require_once __DIR__ . '/includes/auth.php';
session_destroy();
header('Location: /student_qa/index.php');
exit;