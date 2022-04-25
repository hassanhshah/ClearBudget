<?php

require_once 'database.php';

class User {
    private $conn;

    // Constructor
    public function __construct(){
      $database = new Database();
      $db = $database->dbConnection();
      $this->conn = $db;
    }


    // Execute queries SQL
    public function runQuery($sql){
      $stmt = $this->conn->prepare($sql);
      return $stmt;
    }

    // Insert
    public function insert($username, $password){
      try{
        $stmt = $this->conn->prepare("INSERT INTO credentials(username, password) VALUES(:username, :password)");
        $stmt->bindparam(":username", $username);
        $stmt->bindparam(":password", $password);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
        echo $e->getMessage();
      }
    }

    // Insert Request
    public function insertrequest($description, $cost){
      try{
        $stmt = $this->conn->prepare("INSERT INTO requests(description, cost) VALUES(:description, :cost)");
        $stmt->bindparam(":description", $description);
        $stmt->bindparam(":cost", $cost);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
        echo $e->getMessage();
      }
    }

    // Insert Purchase
    public function insertpurchase($description, $cost){
      try{
        $stmt = $this->conn->prepare("INSERT INTO purchases(description, cost) VALUES(:description, :cost)");
        $stmt->bindparam(":description", $description);
        $stmt->bindparam(":cost", $cost);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
        echo $e->getMessage();
      }
    }


    // Update User
    public function update($username, $password, $id){
        try{
          $stmt = $this->conn->prepare("UPDATE credentials SET username = :username, password = :password WHERE id = :id");
          $stmt->bindparam(":username", $username);
          $stmt->bindparam(":password", $password);
          $stmt->bindparam(":id", $id);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
    }

    // Update Request
    public function updaterequest($description, $cost, $id){
        try{
          $stmt = $this->conn->prepare("UPDATE requests SET description = :description, cost = :cost WHERE id = :id");
          $stmt->bindparam(":description", $description);
          $stmt->bindparam(":cost", $cost);
          $stmt->bindparam(":id", $id);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
    }

    // Update Purchase
    public function updatepurchase($description, $cost, $id){
        try{
          $stmt = $this->conn->prepare("UPDATE purchases SET description = :description, cost = :cost WHERE id = :id");
          $stmt->bindparam(":description", $description);
          $stmt->bindparam(":cost", $cost);
          $stmt->bindparam(":id", $id);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
    }


    // Delete User
    public function delete($id){
      try{
        $stmt = $this->conn->prepare("DELETE FROM credentials WHERE id = :id");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
          echo $e->getMessage();
      }
    }

    // Delete Request
    public function deleterequest($id){
      try{
        $stmt = $this->conn->prepare("DELETE FROM requests WHERE id = :id");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
          echo $e->getMessage();
      }
    }

    public function deletepurchase($id){
      try{
        $stmt = $this->conn->prepare("DELETE FROM purchases WHERE id = :id");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
          echo $e->getMessage();
      }
    }


    // Redirect URL method
    public function redirect($url){
      header("Location: $url");
    }
}
?>
