<?php 
  
class database {
    
    # database credentials
   //  private $host      = "mysql-ramen.alwaysdata.net";
    private $host      = "localhost";

   //  private $db_name   = "ramen_project";
    private $db_name   = "projetJS";

    private $username  = "ramen";

   //  private $password  = "";
    private $password  = "";

    public  $connection;
    # get database connection
    public function getConnection() {
        $this->connection = null; #c'est un pote qui connait un mec qui a un cousin qui fait ça
        
        try {
           $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username,$this->password);	
         //   $this->connection->exec("set names utf8");
        }
        catch (PDOException $exception) {      
           echo "Connection error: " . $exception->getMessage(); 
        }
        
    return $this->connection;
    }
 }
?>