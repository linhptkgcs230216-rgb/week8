<?php
$pdo = new PDO('mysql:host=localhost; dbname=student_qa; charset=utf8mb4', 'root', '');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}