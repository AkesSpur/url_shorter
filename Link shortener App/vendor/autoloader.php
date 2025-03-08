<?php

 spl_autoload_register(function ($class) {
   $baseDir = __DIR__ . '/../';

   $className = str_replace('\\','/',$class);

   $file = $baseDir.lcfirst($class).'.php';

   if (file_exists($file)) {
      include $file;
   }
});