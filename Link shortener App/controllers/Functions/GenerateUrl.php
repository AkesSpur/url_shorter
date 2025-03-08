<?php

namespace Controllers\Functions;

use Controllers\Functions\DefaultUrl;

class GenerateUrl
{
   private string  $alphabets;
   private string $randomLetters;

   public function __construct()
   {
      $this->alphabets = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
   }

   public function generateUrl(): array
   {
      $this->randomLetters = substr(str_shuffle($this->alphabets),0,5);
      
      $data = [
         'urlId' => '/'.$this->randomLetters,
         'customUrl' => DefaultUrl::DEFAULTURL . '/' . $this->randomLetters
      ];

      return $data;
   }
}

// $ran = new GenerateUrl;
// var_dump($ran->generateUrl());