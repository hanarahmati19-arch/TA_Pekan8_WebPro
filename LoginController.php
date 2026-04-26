<?php
// auth/LoginController.php
require_once __DIR__ . '/../User.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($username === '' || $password === '') {
    header('Location: ../public/index.php');
    exit;
}

$userModel = new User();
$user = $userModel->authenticate($username, $password);

if ($user) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    header('Location: ../public/dashboard.php');
    exit;
} else {
    header('Location: ../public/index.php');
    exit;
}
