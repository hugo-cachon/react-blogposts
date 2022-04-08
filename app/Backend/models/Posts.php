<?php 

    class Posts {

        private $table = "posts";
        private $connexion;

        public $id;
        public $title;
        public $content;


        public function __construct($db)
        {
            $this->connexion = $db;
        }

        public function getAllPosts() 
        {
            $stmt = "SELECT * FROM " . $this->table . "";
    
            $query = $this->connexion->prepare($stmt);
    
            $query->execute();
    
            return $query;
        }

        public function createPost()
        {
            $stmt = "INSERT INTO " . $this->table . " (id, title, content)
            VALUES (:id, :title, :content)";
    
            $query = $this->connexion->prepare($stmt);
    
            $query->bindParam(":id", $this->id);
            $query->bindParam(":title", $this->title);
            $query->bindParam(":content", $this->content);
            //$query->bindParam(":date", date("Y-m-d"));
    
            if($query->execute())
            {
                return true;
            }
            return false;
        }

        public function deletePost(){

            $stmt = "DELETE FROM " . $this->table . " WHERE id = ?";
    
            $query = $this->connexion->prepare($stmt);
    
            $query->bindParam(1, $this->id);
    
            if($query->execute())
            {
                return true;
            }        
            return false;
        }

    }

?>