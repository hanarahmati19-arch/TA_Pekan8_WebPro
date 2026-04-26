<?php
// public/edit_pendakian.php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../Pendakian.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: dashboard.php');
    exit;
}

$pendakianModel = new Pendakian();
$item = $pendakianModel->getById((int)$id);
if (!$item) {
    header('Location: dashboard.php');
    exit;
}

?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Edit Pendakian</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="dashboard-page">
  <aside class="sidebar">
    <div class="brand">
      <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?w=80&q=80" alt="logo">
      <h2>HIKER BEST</h2>
    </div>
    <nav>
      <a href="dashboard.php">Dashboard</a>
      <a href="../auth/LogoutController.php" class="logout">Logout</a>
    </nav>
  </aside>

  <main class="main">
    <header><h3>Edit Pendakian</h3></header>
    <div class="form-card">
      <form action="save_pendakian.php" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']) ?>">
        <label>Nama Gunung</label>
        <input type="text" name="gunung" value="<?= htmlspecialchars($item['gunung']) ?>" required>
        <label>Tanggal Pendakian</label>
        <input type="date" name="tanggal" value="<?= htmlspecialchars($item['tanggal']) ?>" required>
        <label>Foto (URL)</label>
        <input type="text" name="foto" value="<?= htmlspecialchars($item['foto']) ?>" required>
        <button type="submit" class="btn primary">UPDATE</button>
        <a href="dashboard.php" class="btn">BATAL</a>
      </form>
    </div>
  </main>
</body>
</html>
