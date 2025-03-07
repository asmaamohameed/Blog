<?php

namespace Blog\Model;

use Blog\Database\Database;

class Blogs 
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $stmt = $this->db->query('SELECT * FROM articles');
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
        $stmt = $this->db->prepare("INSERT INTO articles (title, category, article, articleDate, publisher, publisherTitle)
                                    VALUES (:title, :category, :article, :articleDate, :publisher, :publisherTitle)");
        $stmt->execute($data);
        return $this->db->lastInsertId();
    }
 

}
