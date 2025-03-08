<?php

namespace Controllers\PageControllers;

use Controllers\FormActions\StoreUrl;

class AddUrlPageController
{
   public function index()
   {
      $runOperation = new StoreUrl;

      if ($runOperation -> runOperation()) {
         return header('location:/');
      }
   }

}
