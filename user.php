<?php
class user {
	// database connection and table name
    private $connection;
    private $tableName = "user";
    // object properties
    public $id;
    public $pseudo;
    public $lastName;
    public $firstName;
    public $birthday;
    public $email;
    public $pass;
    public $sex;
 
    // constructor with $db as database connection
    public function __construct($db) { //instancier une classe, copie le moule 
        $this->connection = $db;
    }

  // read users
  function read() {
       // select all query
      $query = "SELECT * FROM ".$this->tableName." ORDER BY id ASC";
       // prepare query statement
      $stmt = $this->connection->prepare($query);
       // execute query
      $stmt->execute();
 
      return $stmt;
  }

  // create user
  function create() {
     // query to insert record
    $query = "INSERT INTO "
    .$this->tableName." 
       SET pseudo=:Pseudo, 
            lastName=:Lastname, 
            firstName=:Firstname, 
            birthday=:Birthday, 
            email=:Email, 
            pass=:Pass,
            sex=:Sex";

     // prepare query
    $stmt = $this->connection->prepare($query);
    // sanitize
    $this->pseudo=htmlspecialchars(strip_tags($this->pseudo));
    $this->lastName=htmlspecialchars(strip_tags($this->lastName));
    $this->firstName=htmlspecialchars(strip_tags($this->firstName));
    $this->birthday=htmlspecialchars(strip_tags($this->birthday));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->pass=htmlspecialchars(strip_tags($this->pass));
    $this->sex=htmlspecialchars(strip_tags($this->sex));
    // bind values
    $stmt->bindParam(':Pseudo', $this->pseudo);
    $stmt->bindParam(':Lastname', $this->lastName);
    $stmt->bindParam(':Firstname', $this->firstName);
    $stmt->bindParam(':Birthday', $this->birthday);
    $stmt->bindParam(':Email', $this->email);
    $stmt->bindParam(':Pass', $this->pass);
    $stmt->bindParam(':Sex', $this->sex);
    
    //$arrayUser = array('Pseudo' => $this->pseudo, '' =>);
    //$stmt->execute($arrayUser);
    // execute query
    if($stmt->execute()){
        return true;
    }
     return false;
  }

  // update the product
  function update() {
     // update query
    $query = "UPDATE " . $this->tableName . " SET pseudo=? WHERE id=?";
    // prepare query statement
    $stmt = $this->connection->prepare($query);
 
    // sanitize
    $this->pseudo=htmlspecialchars(strip_tags($this->pseudo));
    $this->id=htmlspecialchars(strip_tags($this->id));
    // bind new values
    $stmt->bindParam(1, $this->pseudo);
    $stmt->bindParam(2, $this->id);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
     return false;
  }
  
  // delete the user
  function delete() {
     // delete query
    $query = "DELETE FROM " . $this->tableName . " WHERE id = ?";
     // prepare query
    $stmt = $this->connection->prepare($query);
     // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
     // bind id of record to delete
    $stmt->bindParam(1, $this->id);
     // execute query
      if($stmt->execute()){
        return true;
    }
      else{
        return false;
    }
  }

   // used when filling up the update product form
   function readOne() {
     // query to read single record
    $query = "SELECT * FROM ".$this->tableName." WHERE id= ?";
    // prepare query statement
    $stmt = $this->connection->prepare($query);
    // bind id of user to be updated
    $stmt->bindParam(1, $this->id);
    // execute query
    $stmt->execute();
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // set values to object properties
    $this->pseudo = $row['pseudo'];
    $this->lastName = $row['lastName'];
    $this->firstName = $row['firstName'];
    $this->birthday = $row['birthday'];
    $this->email = $row['email'];
    $this->pass = $row['pass'];
    $this->sex = $row['sex'];
  }

  // check if given email exist in the database
  function login(){
    $query = "SELECT * FROM ".$this->tableName." WHERE pseudo= ? and pass= ?";
    // prepare query statement
    $stmt = $this->connection->prepare($query);
    // sanitize
    $this->pseudo=htmlspecialchars(strip_tags($this->pseudo));
    $this->pass=htmlspecialchars(strip_tags($this->pass));
    // bind values
    $stmt->bindParam(1, $this->pseudo);
    $stmt->bindParam(2, $this->pass);
    // execute query
    $stmt->execute();
    $count = $stmt->rowCount();
    if($count > 0) {
    return true;  
    }
    else{
      return false;
    }
  }
}