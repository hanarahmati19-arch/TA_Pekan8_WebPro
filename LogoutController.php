<?php
// auth/LogoutController.php
// logout sederhana
session_unset();
session_destroy();
header('Location: ../index.php');
exit;
