<?php 

namespace Models;

use Controllers\Connection;

class AddNewUrl
{
   private string $url;
   private $connection;

   public function __construct()
   {
      $this->connection = new Connection;
   }

   public function addNewUrl(array $data){
      $sql = "INSERT INTO urlholder(originalUrl, shortenUrl, url_id) VALUES(?,?,?)";
      $stmt = $this->connection->connection()->prepare($sql);
      $stmt->execute([$data['originalUrl'], $data['shortenUrl'], $data['urlId']]);
      return $stmt;
   }
}

