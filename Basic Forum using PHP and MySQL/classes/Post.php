<?php
class Post {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createPost($user_id, $title, $body) {
        $stmt = $this->conn->prepare("INSERT INTO posts (user_id, title, body) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user_id, $title, $body);
        return $stmt->execute();
    }

    public function getPosts() {
        $stmt = $this->conn->query("SELECT p.id, p.title, p.body, p.created_at, u.username FROM posts p JOIN users u ON p.user_id = u.id ORDER BY p.created_at DESC");
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostById($id) {
        $stmt = $this->conn->prepare("SELECT p.id, p.title, p.body, p.created_at, u.username FROM posts p JOIN users u ON p.user_id = u.id WHERE p.id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>
