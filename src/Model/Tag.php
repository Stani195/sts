<?php


namespace project\Model;


use PDO;
use project\Database;

class Tag
{
private $id;
private $name;
private $created_at;
private $updated_at;

    /**
     * Tag constructor.
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
public static function all(){
        $tags = [];
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM tags");
        $stmt->execute();
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $fow){
            $tags = new self($fow['id'], $fow['name'], $fow['create_at'],$fow['updated_at']);
        }
        return $tags;
}
public  function delete(){
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("DELETE FROM tags WHERE id =:id");
        $stmt->execute();
}
public static function find($id){
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM tags WHERE id =:id");
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return new self($data['id'], $data['name'], $data['create_at'],$data['updated_at']);

}
public function save(){
        $pdo = Database::getInstance();
        if($this->id == null){
            $stmt = $pdo->prepare("INSERT INTO tags()")
        }else{

        }
}
}