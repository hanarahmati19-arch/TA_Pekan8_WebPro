<?php
// public/save_pendakian.php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/Pendakian.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$pendakianModel = new Pendakian();

$id = trim($_POST['id'] ?? '');
$gunung = trim($_POST['gunung'] ?? '');
$tanggal = trim($_POST['tanggal'] ?? '');
$foto = trim($_POST['foto'] ?? '');

if ($gunung === '') {

    header('Location: dashboard.php');
    exit;
}

if ($id !== '') {
    $ok = $pendakianModel->update((int)$id, $gunung, $tanggal, $foto);

} else {
    $ok = $pendakianModel->create($gunung, $tanggal, $foto);

header('Location: dashboard.php');
exit;
?>
