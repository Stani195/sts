<?php


namespace project\Model;


use function date;
use PDO;
use project\Database;

class PostClass
{
    private $id;
    private $title;
    private $content;
    private $categorie_id;
    private $user_id;
    private $created_at;
    private $updated_at;

    /**
     * PostClass constructor.
     * @param $id
     * @param $title
     * @param $content
     * @param $categorie_id
     * @param $user_id
     * @param $created_at
     * @param $updated_at
     */
    public function __construct($id, $title, $content, $categorie_id, $user_id, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->categorie_id = $categorie_id;
        $this->user_id = $user_id;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getCategorieId()
    {
        return $this->categorie_id;
    }

    /**
     * @param mixed $categorie_id
     */
    public function setCategorieId($categorie_id): void
    {
        $this->categorie_id = $categorie_id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at): void
    {
        $this->updated_at = $updated_at;
    }

    public static function all()
    {

        $posts = [];

        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM post ");
        $stmt->execute();
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $posts[] = new self($row['id'], $row['title'], $row['content'], $row['categorie_id'], $row['user_id'], $row['created_at'], $row['updated_at']);
        }
        return $posts;
    }

    public static function show($id)
    {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
        $stmt->bindParam('id', $id);
        $result = $stmt->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return new self($data['id'], $data['title'], $data['content'], $data['categorie_id'], $data['user_id'], $data['created_at'], $data['updated_at']);

    }

    public function delte()
    {
        $pdo = Database::getInstance();

        $stmt = $pdo->prepare("DELETE FROM posts WHERE id = :id");
        $stmt->bindParam('id', $this->id);
        $stmt->execute();
    }
    public function save()
    {
        $pdo = Database::getInstance();
        if ($this->id == null) {
            $stmt = $pdo->prepare("INSERT INTO posts (id, title, content, categorie_id, user_id, created_at, updated_at) VALUES (NULL , :title, :content, :categorie_id, :user_id, :created_at, NULL )");

            $stmt->bindParam('title', $this->title);
            $stmt->bindParam('content', $this->content);
            $stmt->bindParam('categorie_id', $this->categorie_id);
            $stmt->bindParam('user_id', $this->user_id);
            $stmt->bindParam('created_at', $this->created_at);
            $stmt->execute();

            $this->id = $pdo->lastInsertId();
        } else {
            $stmt = $pdo->prepare("UPDATE  posts  SET title = :title, content = :content, categorie_id = :categorie_id, user_id =:user_id, updated_at = :updated_at WHERE  id = :id");

            $this->updated_at = date('Y-m-d H:i:s');

            $stmt->bindParam('title', $this->title);
            $stmt->bindParam('content', $this->content);
            $stmt->bindParam('categorie_id', $this->categorie_id);
            $stmt->bindParam('user_id', $this->user_id);
            $stmt->bindParam('updated_at', $this->updated_at);
            $stmt->bindParam('id', $this->id);
            $stmt->execute();
        }
    }
}