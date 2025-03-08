<?php

namespace Controllers\Functions;


class validateUrl
{
   private string $url;

   public function __construct(string $url)
   {
      $this->url = $url;
   }

   public function notEmpty(): bool
   {
      return !empty($this->url); 
   }

   public function validateUrl(): bool
   {
     return filter_var($this->url,FILTER_VALIDATE_URL) !== false;
   }
}

