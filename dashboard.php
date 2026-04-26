<?php
// public/dashboard.php
require_once __DIR__ . '/../config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

require_once __DIR__ . '/../models/Pendakian.php';
$pendakianModel = new Pendakian();
$items = $pendakianModel->getAll();

?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>HIKER BEST - Dashboard</title>
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
      <a class="active" href="dashboard.php">Dashboard</a>
      <a href="dashboard.php">Data Pendakian</a>
      <a href="../auth/LogoutController.php" class="logout">Logout</a>
    </nav>
  </aside>

  <main class="main">
    <header>
      <h3>Form Pendakian</h3>
      <div class="user">Halo, <strong><?=htmlspecialchars($_SESSION['username'])?></strong></div>
    </header>

    <?php if ($flash): ?>
      <div class="alert <?= $flash['type'] === 'success' ? 'alert-success' : 'alert-danger' ?>">
        <?= htmlspecialchars($flash['message']) ?>
      </div>
    <?php endif; ?>

    <section class="form-and-table">
      <div class="form-card">
        <form action="save_pendakian.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="">
          <label>Nama Gunung</label>
          <input type="text" name="gunung" required>
          <label>Tanggal Pendakian</label>
          <input type="date" name="tanggal" required>
          <label>Foto (URL)</label>
          <input type="text" name="foto" placeholder="Masukkan link gambar" required>
          <button type="submit" class="btn primary">SIMPAN</button>
        </form>
      </div>

      <div class="table-card">
        <h4>Data Pendakian</h4>
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Gunung</th>
              <th>Tanggal</th>
              <th>Foto</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($items as $row): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= htmlspecialchars($row['gunung']) ?></td>
              <td><?= htmlspecialchars($row['tanggal']) ?></td>
              <td><img class="thumb" src="<?= htmlspecialchars($row['foto']) ?>" alt="foto"></td>
              <td>
                <a class="btn small" href="edit_pendakian.php?id=<?= $row['id'] ?>">Edit</a>
                <a class="btn danger small" href="delete_pendakian.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
              </td>
            </tr>
            <?php endforeach; ?>
            <?php if (count($items)===0): ?>
            <tr><td colspan="5">Belum ada data</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </section>
  </main>
</body>
</html>
