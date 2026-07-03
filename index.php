<?php
include 'includes/DatabaseConnection.php';

$title = 'Student Q&A - Home';
ob_start();
include 'templates/home.html.php';
$output = ob_get_clean();

include 'templates/layout.html.php';