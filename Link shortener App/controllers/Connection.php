<?php 

namespace Controllers;

class Connection

{
   public string $hostname;
   public string $username;
   public ?string $password;
   public string $dbname;

   public function connection()
   {
      try{
       $this->hostname='localhost';
       $this->username='root';
       $this->password='';
       $this->dbname='linkshortenerapp';
      
      $conn= new \PDO("mysql:host={$this->hostname};dbname={$this->dbname}",
                                   $this->username,$this?->password);
      $conn->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);

      return $conn;
    
   } catch (\PDOException $e) {
      return $e->getMessage();
   }
   }

}

