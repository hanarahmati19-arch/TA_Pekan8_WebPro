<?php
// models/User.php
require_once __DIR__ . '/../config.php';

class User {
    private \PDO $conn;

    public function __construct() {
        $db = new Database();

    }

    /**
     * Authenticate user.
     * NOTE: demo uses SHA256 stored password (see db.sql). Untuk produksi gunakan password_hash/password_verify.
     */
    public function authenticate(string $username, string $password) {
        $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();
        if ($user) {
            // Demo: password disimpan SHA2(...,256)
            if (hash('sha256', $password) === $user['password']) {
                return $user;
            }
        }
        return false;
    }
}
