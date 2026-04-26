<?php
// models/Pendakian.php
require_once __DIR__ . '/../config.php';

class Pendakian {
    private \PDO $conn;

    public function __construct() {
        $db = new Database();

    }

    public function getAll(): array {
        $sql = "SELECT * FROM pendakian ORDER BY id ASC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }

    public function getById(int $id): ?array {
        $sql = "SELECT * FROM pendakian WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public function create(string $gunung, string $tanggal, string $foto): bool {
        $sql = "INSERT INTO pendakian (gunung, tanggal, foto) VALUES (:gunung, :tanggal, :foto)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['gunung'=>$gunung, 'tanggal'=>$tanggal, 'foto'=>$foto]);
    }

    public function update(int $id, string $gunung, string $tanggal, string $foto): bool {
        $sql = "UPDATE pendakian SET gunung = :gunung, tanggal = :tanggal, foto = :foto WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['gunung'=>$gunung, 'tanggal'=>$tanggal, 'foto'=>$foto, 'id'=>$id]);
    }

    public function delete(int $id): bool {
        $sql = "DELETE FROM pendakian WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id'=>$id]);
    }
}
