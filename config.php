<?php
class Database {
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $db="hiker_best";
    public $conn;

    public function connect(){
        $this->conn = new mysqli($this->host,$this->user,$this->pass,$this->db);

        if($this->conn->connect_error){
            die("Koneksi gagal: " . $this->conn->connect_error);
        }

        return $this->conn;
    }
}

class User {
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function login($u,$p){
        $p = md5($p);
        return $this->conn->query("SELECT * FROM users WHERE username='$u' AND password='$p'");
    }
}

class Pendakian {
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function getAll(){
        return $this->conn->query("SELECT * FROM pendakian");
    }

    public function getById($id){
        return $this->conn->query("SELECT * FROM pendakian WHERE id='$id'");
    }

    public function simpan($id,$g,$t,$f){
        if($id==""){
            return $this->conn->query("INSERT INTO pendakian VALUES(NULL,'$g','$t','$f')");
        }else{
            return $this->conn->query("UPDATE pendakian SET 
            gunung='$g', tanggal='$t', foto='$f' WHERE id='$id'");
        }
    }

    public function delete($id){
        return $this->conn->query("DELETE FROM pendakian WHERE id='$id'");
    }
}
?>
