<?php
// public/index.php
require_once __DIR__ . '/../config.php';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>HIKER BEST - Login</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="login-page">
  <div class="login-overlay"></div>

  <div class="login-box">
    <div class="logo">
      <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?w=200&q=80" alt="logo">
      <h1>HIKER BEST</h1>
    </div>

    <?php if ($flash): ?>
      <div class="alert <?= $flash['type'] === 'success' ? 'alert-success' : 'alert-danger' ?>">
        <?= htmlspecialchars($flash['message']) ?>
      </div>
    <?php endif; ?>

    <form action="../auth/LoginController.php" method="post" class="login-form" autocomplete="off">
      <label>Username</label>
      <input type="text" name="username" value="Hana" required>
      <label>Password</label>
      <input type="password" name="password" value="password123" required>
      <button type="submit" class="btn primary">LOGIN</button>
      <p class="copyright">© 2024 Hiker Best</p>
    </form>
  </div>
</body>
</html>
