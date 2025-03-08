<?php

namespace Controllers\FormActions;

use Controllers\Functions\{GenerateUrl, Message, validateUrl};
use Models\AddNewUrl;
use Throwable;

class StoreUrl
{
   public function runOperation(): bool
   {
      try {
         if (isset($_POST['url'])) {
            $url = trim($_POST['url']);   
      
            $validateURl = new validateUrl($url);   
      
            if ($validateURl->notEmpty()) {

               if ($validateURl->validateUrl()) {
      
                  $customUrl = (new GenerateUrl()) -> generateUrl();
         
                  $data = [
                     'originalUrl' => $url,
                     'shortenUrl' => $customUrl['customUrl'],
                     'urlId' => $customUrl['urlId']
                  ];
         
                  $addNewUrl = (new AddNewUrl())->addNewUrl($data);

                  $sessionMessages = new Message();
                  $sessionMessages ->sessionMessage('customUrl', $customUrl['customUrl']);
                  $sessionMessages ->sessionMessage('success', "Operation Successful");
         
                  return true;
                  
               } else {
                  throw new \Exception("Invalid Url");         
               }
   
            } else {
               throw new \Exception("Input can not be empty ");
            }
         } else {
            throw new \Exception("Input box cannot be empty.Input Url");      
         }
         
      } catch (\Throwable $e) {

         $errorMessage = new Message();

         return $errorMessage -> sessionMessage('error', $e -> getMessage()); 
      }
   
   }

}





