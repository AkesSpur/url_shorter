<?php

namespace Controllers\Router;

use Controllers\PageControllers\ErrorPageController;
use Models\GetUrl;

class Routes
{
   private array $routes;

   public function register(string $requestMethod, string $route, callable|array $action): self
   {
      $this->routes[$requestMethod][$route] = $action;

      return $this;
   }

   public function get(string $route, callable|array $action): self
   {
      return $this->register('get', $route, $action);
   }

   public function post(string $route, callable|array $action): self
   {
      return $this->register('post', $route, $action);
   }

   public function routes()
   {
      return $this->routes;
   }

   public function resolve(string $requestUrl, string $requestMethod)
   {
      $route = explode('?', $requestUrl)[0];

      if (isset($this->routes[$requestMethod][$route])) {

         $action = $this->routes[$requestMethod][$route];

         if (is_callable($action)) {
            return call_user_func($action);
         }
         if (is_array($action)) {
            [$class, $method] = $action;
   
            if (class_exists($class)) {
               $class = new $class();
   
               if (method_exists($class, $method)) {
                  return call_user_func_array([$class, $method], []);
               }
            }
         }
      
      }
      elseif($requestUrl){
         $db = new GetUrl;

         if ($db->checkUrlExistence($requestUrl)) {

            $url = $db -> getUrl($requestUrl);

            return header('location:'.$url['originalUrl']);

         } else {
            $errorPage = new ErrorPageController();
            return $errorPage -> errorPage();
         }         
      } 
      else {
         $errorPage = new ErrorPageController();
         return $errorPage -> errorPage();
      }
      


      // var_dump($action);
      // die;

      // if (!$action) {
      //    throw new \Exception("404 page error 22");
      // }


   }
}
