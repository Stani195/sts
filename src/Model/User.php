<?php


namespace project\Model;

use function date;
use PDO;
use project\Database;
use function var_dump;

class User
{
    private $id;
    private $email;
    private $password;
    private $created_at;
    private $updated_at;

    /**
     * User constructor.
     * @param $id
     * @param $email
     * @param $created_at
     * @param $updated_at
     */
    public function __construct($id = null, $email, $password, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
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
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public static function all()
    {
        $users = [];
        /** @var  PDO $pdo */
        $pdo = Database::getInstance();

        $stmt = $pdo->prepare("SELECT * FROM users ");
        $stmt->execute();
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $users[] = new self($row['id'], $row['email'], $row['password'], $row['created_at'], $row['updated_at']);
        }
        return $users;
    }

    public static function find($id)
    {

        /** @var  \PDO $pdo */
        $pdo = Database::getInstance();


        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam('id', $id);
        $result = $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return new self($data['id'], $data['email'], $data['password'], $data['created_at'], $data['updated_at']);

    }

    public function delete()
    {
        $pdo = Database::getInstance();

        $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam('id', $this->id);
        $stmt->execute();
    }

    public function save()
    {
        $pdo = Database::getInstance();
        if ($this->id == null) {
            $stmt = $pdo->prepare("INSERT INTO Users (id, email, password, created_at, updated_at) VALUES (NULL , :email, :password, :created_at, NULL )");

            $stmt->bindParam('email', $this->email);
            $stmt->bindParam('password', $this->password);
            $stmt->bindParam('created_at', $this->created_at);
            $stmt->execute();

            $this->id = $pdo->lastInsertId();
        } else {
            $stmt = $pdo->prepare("UPDATE  users  SET email = :email, password = :password, updated_at = :updated_at WHERE  id = :id");

            $this->updated_at = date('Y-m-d H:i:s');

            $stmt->bindParam('email', $this->email);
            $stmt->bindParam('password', $this->password);
            $stmt->bindParam('updated_at', $this->updated_at);
            $stmt->bindParam('id', $this->id);
            $stmt->execute();
        }
    }
}