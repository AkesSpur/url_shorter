<?php

namespace Controllers\PageControllers;

use Controllers\View;

class ErrorPageController
{
   public function errorPage(): string
   {
      return (string) (new View('error'))->render();
   }

}
