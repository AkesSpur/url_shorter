<?php

namespace Controllers\PageControllers;

use Controllers\View;

class HomePageController
{
   public function index(): string
   {
      return (string) (new View('index'))->render();
   }

}
