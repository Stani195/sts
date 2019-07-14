<?php


namespace project\Model;


use function date;
use PDO;
use project\Database;

class Categorie
{
    private $id;
    private $name;
    private $created_at;
    private $updated_at;

    /**
     * Categorie constructor.
     * @param $id
     * @param $name
     * @param $created_at
     * @param $updated_at
     */
    public function __construct($id, $name, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->name = $name;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
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
        $categories = [];

        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM categories");
        $stmt->execute();
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $categories = new self($row['id'], $row['name'], $row['created_at'], $row['update_at']);
        }
        return $categories;
    }
    public static function find($id){
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM categories WHERE id =:id");
        $stmt->bindParam('id',$id);
        $result = $stmt->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return new self($data['id'], $data['name'], $data['created_at'], $data['update_at']);
    }
public function delete(){
        $pdo = Database::getInstance()
;
        $stmt = $pdo->prepare("DELETE  FROM categories WHERE id =:id");
        $stmt->bindParam('id', $id);
        $stmt->execute();

    }
public function save(){
        $pdo = Database::getInstance();
        if($this->id == null){
            $stmt = $pdo->prepare("INSERT INTO categories(id, name, created_at, updated_at) VALUES (null , :name, :created_at,null )");
            $stmt->bindParam('name',$this->name);
            $stmt->bindParam('created_at',$this->created_at);
            $stmt->execute();
            $this->id = $pdo->lastInsertId();
        } else{
            $stmt = $pdo->prepare("UPDATE  categories  SET name = :name,  updated_at = :updated_at WHERE  id = :id");

            $this->updated_at = date('Y-m-d H:i:s');

            $stmt->bindParam('name', $this->name);
            $stmt->bindParam('updated_at', $this->updated_at);
            $stmt->bindParam('id', $this->id);
            $stmt->execute();
        }
}

}
