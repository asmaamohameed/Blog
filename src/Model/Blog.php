<?php

namespace Blog\Model;

use Blog\Database\Database;

class Blog
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM articles');
        return $stmt->fetchAll();
    }
    public function getForUser($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM articles WHERE user_id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll();
    }

    public function getOne($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM articles WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO articles (user_id, title, category, article, articleDate, publisher, publisherTitle)
                                    VALUES (:user_id, :title, :category, :article, :articleDate, :publisher, :publisherTitle)");
        $stmt->execute($data);
        return $this->db->lastInsertId();
    }
    public function delete()
    {
        $stmt = $this->db->prepare('DELETE FROM articles WHERE id = :id');
        $stmt->execute(['id' => $_POST['id']]);
    }
    public function update($data)
    {
        $stmt = $this->db->prepare('UPDATE articles SET title = :title, category = :category, article = :article,
        articleDate = :articleDate, publisher= :publisher, publisherTitle = :publisherTitle WHERE id = :id');
        $stmt->execute($data);
    }
}
