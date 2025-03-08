<?php

namespace Controllers;

class View
{
   public function __construct(protected string $view, array $params = [])
   {  
   }

   public function render(): string
   {
      $viewPath = VIEW_PATH . '/' . $this->view . '.php';


      if (! file_exists($viewPath)) {
         throw new \Exception("invalid path");
      }

      ob_start();

      include $viewPath;
      
      return (string) ob_get_clean();

      // return VIEW_PATH;
   }
}
