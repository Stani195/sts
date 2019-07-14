<?php


namespace project\Model;


use function date;
use PDO;
use project\Database;

class Comment
{
    private $id;
    private $text;
    private $created_at;
    private $updated_at;
    private $post_id;
    private $user_id;

    /**
     * Comments constructor.
     * @param $id
     * @param $text
     * @param $created_at
     * @param $updated_at
     * @param $post_id
     * @param $user_id
     */
    public function __construct($id, $text, $created_at, $updated_at, $post_id, $user_id)
    {
        $this->id = $id;
        $this->text = $text;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->post_id = $post_id;
        $this->user_id = $user_id;
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
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text): void
    {
        $this->text = $text;
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

    /**
     * @return mixed
     */
    public function getPostId()
    {
        return $this->post_id;
    }

    /**
     * @param mixed $post_id
     */
    public function setPostId($post_id): void
    {
        $this->post_id = $post_id;
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

    public static function all()
    {
        $comments = [];
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM comments");
        $stmt->execute();
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $comments = new self($row['id'], $row['test'], $row['created_at'], $row['update_at'], $row['pos_id'], $row['user_id']);
        }

        return $comments;
    }

    public static function find($id)
    {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM comments WHERE id =: id");
        $stmt->bindParam('id', $id);
        $result = $stmt->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return new self($data['id'], $data['text'], $data['created_at'], $data['update_at'], $data['pos_id'], $data['user_id']);
    }

    public function delete()
    {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("DELETE FROM comments WHERE id =:id");
        $stmt->execute();

    }

    public function save()
    {
        $pdo = Database::getInstance();
        if ($this->id == null) {
            $stmt = $pdo->prepare("INSERT INTO comments (id, text, created_at, updated_at, post_id, user_id) VALUES (NULL , :text,:created_at, null, :post_id, :user_id)");
            $stmt->bindParam('text', $this->text);
            $stmt->bindParam('created_at', $this->created_at);
            $stmt->bindParam('post_id', $this->post_id);
            $stmt->bindParam('user_id', $this->user_id);
            $stmt->execute();

            $this->id = $pdo->lastInsertId();

        } else {
            $stmt = $pdo->prepare("UPDATE comments SET text =:text, updated_at =: updated_at WHERE id =:id");

            $this->updated_at = date('Y-m-d H:i:s');

            $stmt->bindParam('text', $this->text);
            $stmt->bindParam('updated_at', $this->updated_at);
            $stmt->bindParam('id', $this->id);
            $stmt->execute();
        }
    }
}