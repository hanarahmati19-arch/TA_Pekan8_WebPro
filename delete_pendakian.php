<?php
// public/delete_pendakian.php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../Pendakian.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'] ?? null;
if ($id) {
    $pendakianModel = new Pendakian();
    $ok = $pendakianModel->delete((int)$id);

}

header('Location: dashboard.php');
exit;
