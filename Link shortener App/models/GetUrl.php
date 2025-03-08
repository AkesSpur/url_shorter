<?php

namespace Models;

use Controllers\Connection;

class GetUrl
{
   private string $urlId;
   private $connection;

   public function __construct()
   {
      $this->connection = new Connection;
   }

   public function getUrl($urlId): array
   {
      $sql = "SELECT * FROM urlholder WHERE url_id=?";
      $stmt = $this->connection->connection()->prepare($sql);
      $stmt->execute([$urlId]);
      $url = $stmt->fetch(\PDO::FETCH_ASSOC);
      return $url;
   }

   public function checkUrlExistence($urlId): bool
   {
      $sql = "SELECT * FROM urlholder WHERE url_id=?";
      $stmt = $this->connection->connection()->prepare($sql);
      $stmt->execute([$urlId]);
      $rowCount = $stmt->rowCount();

      if ($rowCount > 0) {
         return true;
      }else {
         return false;
      }
   }
}
