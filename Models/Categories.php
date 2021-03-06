<?php
include_once 'Config/Database.php';

class Categories{
    private $database;

    public function __construct()
    {
        $connection = Database::getInstance();
        $this->database = $connection->getConnection();
    }

    public function add_category($cat)
    {
        $req = $this->database->prepare("SELECT category FROM categories WHERE category=:category;");
        $req->execute(array(":category" => $cat));
        
        if ($req->fetch() == false) {
            $req->closeCursor();
            $req = $this->database->prepare("INSERT INTO categories(category) VALUES (:category);");
            $req->execute(array(":category" => $cat));
        } else {
            //echo "<p>This category already exists.</p>";
            return (false);
        }
    }

    public function delete_category($id)
    {
        $sql="DELETE FROM categories WHERE id=?";
        $req=$this->database->prepare($sql);
        $req->execute(array($id));
        $this->update_category($id);
       
    }

    public function update_category($id)
    {
        $sql="UPDATE articles SET category_id =null WHERE category_id=:category";
        $req=$this->database->prepare($sql);
        $req->execute(array(":category" => $id));
    }

    public function edit_category($id, $category)
    {
        $sql="UPDATE categories SET category = ? WHERE id=?";
        $req = $this->database->prepare($sql);
        $req->execute(array($category, $id));
    }

    public function getCategories()
    {
        $sql = "SELECT category, id FROM categories ORDER BY category;";
        $req = $this->database->query($sql);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return ($res);
    }

    public function getCategory($id)
    {
        $sql = "SELECT category FROM categories WHERE id = :id;";
        $req = $this->database->prepare($sql);
        $req->execute(array(":id"=>$id));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return ($res["category"]);
    }

    public function getCatID($cat)
    {
        $req = $this->database->prepare("SELECT id FROM categories WHERE category=:category;");
        $req->execute(array(":category" => $cat));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return ($res['id']);
    }
}